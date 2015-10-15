<?php

/* default/doodle.html.twig */
class __TwigTemplate_fb4d0b5e075db0b795ce66a0e5e4698a89a22283316e3da5705543b4e2e8caeb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "default/doodle.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_476295d9378558c89af2528273acf9031d96a6098ebcf330a006aaeb4225dada = $this->env->getExtension("native_profiler");
        $__internal_476295d9378558c89af2528273acf9031d96a6098ebcf330a006aaeb4225dada->enter($__internal_476295d9378558c89af2528273acf9031d96a6098ebcf330a006aaeb4225dada_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "default/doodle.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_476295d9378558c89af2528273acf9031d96a6098ebcf330a006aaeb4225dada->leave($__internal_476295d9378558c89af2528273acf9031d96a6098ebcf330a006aaeb4225dada_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_d9d7f34e096407a1b8ebe1b1fa580f7a52e8686da4d4904b900929d063ca69e3 = $this->env->getExtension("native_profiler");
        $__internal_d9d7f34e096407a1b8ebe1b1fa580f7a52e8686da4d4904b900929d063ca69e3->enter($__internal_d9d7f34e096407a1b8ebe1b1fa580f7a52e8686da4d4904b900929d063ca69e3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <div class=\"container\">
        <div class=\"title\">Bacon<span class=\"doodle\">Doodle!</span></div>

        <div class=\"canvas\">
            <canvas id=\"bacon-canvas\"></canvas>
            <div class=\"clear-canvas\">Clear</div>

            <div class=\"controls hidden\">
                <input class=\"color\">
                <div id=\"color-icon\" class=\"control-icon\">
                    <img src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/BaconDoodle/Resources/public/img/palette.png"), "html", null, true);
        echo "\">
                </div>

                <select class=\"stroke-size\">
                    <option value=\"1\">Small</option>
                    <option value=\"5\">Medium</option>
                    <option value=\"10\">Large</option>
                </select>

                <div id=\"stroke-size-icon\" class=\"control-icon\">
                    <i class=\"fa fa-paint-brush\"></i>
                </div>

                <div class=\"choose-background\">
                    <i class=\"fa fa-long-arrow-left background-prev\"></i>
                    <span>Background</span>
                    <i class=\"fa fa-long-arrow-right background-next\"></i>
                </div>
            </div>
        </div>

        <div class=\"new-doodle\">New Doodle</div>

        <div class=\"doodle-form hidden\">
            <div class=\"inner-title right\">Save Doodle</div>

            ";
        // line 40
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start');
        echo "
            ";
        // line 41
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "

            ";
        // line 43
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "author", array()), 'row');
        echo "
            ";
        // line 44
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "title", array()), 'row');
        echo "
            ";
        // line 45
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
        </div>

        <div class=\"doodles\">
            <div id=\"prev-doodles\" class=\"inner-title left\">All Doodles</div>

            ";
        // line 51
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "entries", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["entry"]) {
            // line 52
            echo "                <div class=\"entry\">
                    <div class=\"doodle-id\">";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute($context["entry"], "id", array()), "html", null, true);
            echo "</div>
                    <div class=\"doodle-pic\"><img src=\"";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute($context["entry"], "data", array()), "html", null, true);
            echo "\"></div>
                    <div class=\"entry-title\">";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute($context["entry"], "title", array()), "html", null, true);
            echo "</div>
                    <div class=\"author-date\">
                        <div class=\"author\">";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute($context["entry"], "author", array()), "html", null, true);
            echo "</div>
                        <div class=\"created\">";
            // line 58
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["entry"], "created", array()), "m/d/Y"), "html", null, true);
            echo "</div>
                    </div>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entry'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        echo "        </div>
    </div>
";
        
        $__internal_d9d7f34e096407a1b8ebe1b1fa580f7a52e8686da4d4904b900929d063ca69e3->leave($__internal_d9d7f34e096407a1b8ebe1b1fa580f7a52e8686da4d4904b900929d063ca69e3_prof);

    }

    public function getTemplateName()
    {
        return "default/doodle.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 62,  131 => 58,  127 => 57,  122 => 55,  118 => 54,  114 => 53,  111 => 52,  107 => 51,  98 => 45,  94 => 44,  90 => 43,  85 => 41,  81 => 40,  52 => 14,  40 => 4,  34 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block body %}*/
/*     <div class="container">*/
/*         <div class="title">Bacon<span class="doodle">Doodle!</span></div>*/
/* */
/*         <div class="canvas">*/
/*             <canvas id="bacon-canvas"></canvas>*/
/*             <div class="clear-canvas">Clear</div>*/
/* */
/*             <div class="controls hidden">*/
/*                 <input class="color">*/
/*                 <div id="color-icon" class="control-icon">*/
/*                     <img src="{{  asset('bundles/BaconDoodle/Resources/public/img/palette.png') }}">*/
/*                 </div>*/
/* */
/*                 <select class="stroke-size">*/
/*                     <option value="1">Small</option>*/
/*                     <option value="5">Medium</option>*/
/*                     <option value="10">Large</option>*/
/*                 </select>*/
/* */
/*                 <div id="stroke-size-icon" class="control-icon">*/
/*                     <i class="fa fa-paint-brush"></i>*/
/*                 </div>*/
/* */
/*                 <div class="choose-background">*/
/*                     <i class="fa fa-long-arrow-left background-prev"></i>*/
/*                     <span>Background</span>*/
/*                     <i class="fa fa-long-arrow-right background-next"></i>*/
/*                 </div>*/
/*             </div>*/
/*         </div>*/
/* */
/*         <div class="new-doodle">New Doodle</div>*/
/* */
/*         <div class="doodle-form hidden">*/
/*             <div class="inner-title right">Save Doodle</div>*/
/* */
/*             {{  form_start(form) }}*/
/*             {{ form_errors(form) }}*/
/* */
/*             {{ form_row(form.author) }}*/
/*             {{ form_row(form.title) }}*/
/*             {{  form_end(form) }}*/
/*         </div>*/
/* */
/*         <div class="doodles">*/
/*             <div id="prev-doodles" class="inner-title left">All Doodles</div>*/
/* */
/*             {% for entry in data.entries %}*/
/*                 <div class="entry">*/
/*                     <div class="doodle-id">{{ entry.id }}</div>*/
/*                     <div class="doodle-pic"><img src="{{ entry.data }}"></div>*/
/*                     <div class="entry-title">{{ entry.title }}</div>*/
/*                     <div class="author-date">*/
/*                         <div class="author">{{ entry.author }}</div>*/
/*                         <div class="created">{{ entry.created|date("m/d/Y") }}</div>*/
/*                     </div>*/
/*                 </div>*/
/*             {% endfor %}*/
/*         </div>*/
/*     </div>*/
/* {% endblock %}*/
