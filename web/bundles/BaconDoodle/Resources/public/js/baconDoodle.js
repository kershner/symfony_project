(function(){
	// colorWave for title
	var COLORS = ['#25B972', '#ff6767', '#FFA533', '#585ec7', '#FF8359'];
	$('.doodle').colorWave(COLORS);
	setInterval(function() {
		$('.doodle').colorWave(COLORS);
	}, 3000);

	// Canvas init
	init();
})();

function clearCanvas() {
	$('.clear-canvas').on('click', function() {
		stage.clear();
		var myImage = new Image();
		var src = '/bundles/BaconDoodle/Resources/public/img/bacon6.jpg';
		myImage.src = src;
		$(myImage).on('load', function() {
			var ctx = canvas.getContext('2d');
			ctx.drawImage(myImage, 0, 0, myImage.width, myImage.height, 0, 0, canvas.width, canvas.height);
		});
	});
}

function saveCanvas() {
	var dataUrl = canvas.toDataURL();
	$('#title_data').val('');
	$('#title_data').val(dataUrl);
}

function pickColor() {
	$('.color').on('change', function() {
		var userColor = $(this).val();
		color = '#' + userColor;
	});
}

function strokeSize() {
	$('.stroke-size').on('change', function() {
		var userStroke = $(this).val();
		stroke = Number(userStroke);
	});
}

var canvas, stage;
var drawingCanvas;
var oldPt;
var oldMidPt;
var title;
var color;
var stroke;
var colors;
var index;

function init() {
	canvas = document.getElementById("bacon-canvas");
	index = 0;
	color = '#FFFFFF';
	stroke = 1;
	var myImage = new Image();
	var src = '/bundles/BaconDoodle/Resources/public/img/bacon6.jpg';
	myImage.src = src;
	$(myImage).on('load', function() {
		var ctx = canvas.getContext('2d');
		ctx.drawImage(myImage, 0, 0, myImage.width, myImage.height, 0, 0, canvas.width, canvas.height);
	});

	//check to see if we are running in a browser with touch support
	stage = new createjs.Stage(canvas);
	stage.autoClear = false;
	stage.enableDOMEvents(true);

	createjs.Touch.enable(stage);
	createjs.Ticker.setFPS(24);

	drawingCanvas = new createjs.Shape();

	stage.addEventListener("stagemousedown", handleMouseDown);
	stage.addEventListener("stagemouseup", handleMouseUp);

	title = new createjs.Text("Click and Drag to draw", "36px Arial", "#777777");
	title.x = 300;
	title.y = 200;
	stage.addChild(title);

	stage.addChild(drawingCanvas);
	stage.update();

	clearCanvas();
	pickColor();
	strokeSize();
}

function handleMouseDown(event) {
	if (!event.primary) { return; }
	if (stage.contains(title)) {
		stage.removeChild(title);
	}
	oldPt = new createjs.Point(stage.mouseX, stage.mouseY);
	oldMidPt = oldPt.clone();
	stage.addEventListener("stagemousemove", handleMouseMove);
}

function handleMouseMove(event) {
	if (!event.primary) { return; }
	var midPt = new createjs.Point(oldPt.x + stage.mouseX >> 1, oldPt.y + stage.mouseY >> 1);

	drawingCanvas.graphics.clear().setStrokeStyle(stroke, 'round', 'round').beginStroke(color).moveTo(midPt.x, midPt.y).curveTo(oldPt.x, oldPt.y, oldMidPt.x, oldMidPt.y);

	oldPt.x = stage.mouseX;
	oldPt.y = stage.mouseY;

	oldMidPt.x = midPt.x;
	oldMidPt.y = midPt.y;
	stage.update();
}

function handleMouseUp(event) {
	if (!event.primary) { return; }
	stage.removeEventListener("stagemousemove", handleMouseMove);
	saveCanvas();
}
