(function(){
	// color array for colorWave
	var COLORS = ['#25B972', '#ff6767', '#FFA533', '#585ec7', '#FF8359'];
	main(COLORS);
})();

function main(colors) {
	// colorWave for title
	$('.doodle').colorWave(colors);
	setInterval(function() {
		$('.doodle').colorWave(colors);
		$('.inner-title').colorWave(colors);
	}, 3000);
	newDoodle();
	closeControls();
	newComment();
	colorEntries();
	chooseBackground();

	// Canvas init
	init();
}

function newDoodle() {
	$('.new-doodle').on('click', function() {
		console.log('Clicked!');
		$(this).toggleClass('hidden');
		$(this).parents('.controls-row').css({
			'background-color': '#D1E890',
			'padding': '2.5em'
		});
		$('.controls, .doodle-form, .close-controls').toggleClass('hidden');
	});
}

function closeControls() {
	$('.close-controls').on('click', function () {
		$(this).parents('.controls-row').css({
			'background-color': '#FFFFFF',
			'padding': '0'
		});
		$(this).toggleClass('hidden');
		$(this).siblings('.controls, .doodle-form, .new-doodle').toggleClass('hidden');
	});
}

function newComment() {
	$('.doodle-comments-new').on('click', function() {
		var html = 	'<form class="comment-entry">' +
					'<input type="text" class="comment-text" name="comment" placeholder="Text" maxlength="140" required="true">' +
					'<button class="comment-submit" type="submit">Submit</button></form>';
		$(this).parents('.entry').append(html);
		var form = $(this).parents('.entry').find('.comment-entry');
		submitComment(form);
	});
}

function submitComment(form) {
	form.children('.comment-submit').on('click', function(e) {
		e.preventDefault();
        e.stopImmediatePropagation();
        var comment = $(this).siblings('.comment-text').val();
        var id = $(this).parents('.entry').find('.doodle-id').text();
		$.ajax({
                url: '/comment',
                type: 'POST',
                data: {
                    'comment': comment,
                    'id': id
                },
                success: function(json) {
                    console.log('SUCCESS!');
                    console.log(json);
                },
                error: function(xhr, errmsg, err) {
                    console.log('Error!');
                    console.log(errmsg);
                    console.log(xhr.status + ': ' + xhr.responseText);
                }
            });
	});
}

function colorEntries() {
	var colors = ['#544B8D', '#984681', '#A6C159', '#896AA4', '#B671A3', '#7971A9'];
	var counter = 0;
	$('.entry').each(function() {
		if (counter > colors.length -1) {
			counter = 0;
		}
		var colorChoice = colors[counter];
		$(this).css('background-color', colorChoice);
		$(this).children('.doodle-id').css('background-color', colorChoice);
		counter += 1;
	});
}

function clearCanvas() {
	$('.clear-canvas').on('click', function() {
		stage.clear();
		var myImage = new Image();
		var src = '/bundles/BaconDoodle/Resources/public/img/bacon' + currentPic + '.jpg';
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

function chooseBackground() {
	$('.background-prev').on('click', function() {
		currentPic -= 1;
		if (currentPic < 1) {
			currentPic = 6;
		}
		stage.clear();
		var myImage = new Image();
		var src = '/bundles/BaconDoodle/Resources/public/img/bacon' + currentPic + '.jpg';
		myImage.src = src;
		$(myImage).on('load', function() {
			var ctx = canvas.getContext('2d');
			ctx.drawImage(myImage, 0, 0, myImage.width, myImage.height, 0, 0, canvas.width, canvas.height);
		});
	});
	$('.background-next').on('click', function() {
		currentPic += 1;
		if (currentPic > 6) {
			currentPic = 1;
		}
		stage.clear();
		var myImage = new Image();
		var src = '/bundles/BaconDoodle/Resources/public/img/bacon' + currentPic + '.jpg';
		myImage.src = src;
		$(myImage).on('load', function() {
			var ctx = canvas.getContext('2d');
			ctx.drawImage(myImage, 0, 0, myImage.width, myImage.height, 0, 0, canvas.width, canvas.height);
		});
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
var currentPic;

function init() {
	canvas = document.getElementById("bacon-canvas");
	index = 0;
	color = '#FFFFFF';
	stroke = 1;
	if (currentPic === undefined) {
		currentPic = 1;
	}
	var myImage = new Image();
	var src = '/bundles/BaconDoodle/Resources/public/img/bacon' + currentPic + '.jpg';
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