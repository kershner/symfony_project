<?php

/* base.html.twig */
class __TwigTemplate_d6c5a1baac06a21476a65f40f650f68f17f4ac040244ad2adc7ad32dbb1389b6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_08ae3e82c1477ff27c3784bebe45a142a77e95dfaaddd6bb17b98f3b6b819d44 = $this->env->getExtension("native_profiler");
        $__internal_08ae3e82c1477ff27c3784bebe45a142a77e95dfaaddd6bb17b98f3b6b819d44->enter($__internal_08ae3e82c1477ff27c3784bebe45a142a77e95dfaaddd6bb17b98f3b6b819d44_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>
            ";
        // line 6
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "title", array(), "any", true, true)) {
            // line 7
            echo "                ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")), "title", array()), "html", null, true);
            echo "
            ";
        } else {
            // line 9
            echo "                Welcome!
            ";
        }
        // line 11
        echo "        </title>

        ";
        // line 13
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 16
        echo "
        <!-- Fonts -->
        <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css\">
        <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 25
        $this->displayBlock('body', $context, $blocks);
        // line 26
        echo "
        ";
        // line 27
        $this->displayBlock('javascripts', $context, $blocks);
        // line 35
        echo "    </body>
</html>
";
        
        $__internal_08ae3e82c1477ff27c3784bebe45a142a77e95dfaaddd6bb17b98f3b6b819d44->leave($__internal_08ae3e82c1477ff27c3784bebe45a142a77e95dfaaddd6bb17b98f3b6b819d44_prof);

    }

    // line 13
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_2a12b577475a34e6e74c7226c2383ad76265d8564ebda29af4945a89a3045e1d = $this->env->getExtension("native_profiler");
        $__internal_2a12b577475a34e6e74c7226c2383ad76265d8564ebda29af4945a89a3045e1d->enter($__internal_2a12b577475a34e6e74c7226c2383ad76265d8564ebda29af4945a89a3045e1d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 14
        echo "            <link type=\"text/css\" rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/BaconDoodle/Resources/public/css/BaconDoodle.css"), "html", null, true);
        echo "\" />
        ";
        
        $__internal_2a12b577475a34e6e74c7226c2383ad76265d8564ebda29af4945a89a3045e1d->leave($__internal_2a12b577475a34e6e74c7226c2383ad76265d8564ebda29af4945a89a3045e1d_prof);

    }

    // line 25
    public function block_body($context, array $blocks = array())
    {
        $__internal_50a60d36c77d6369c75d3e74dcb85c570949fb5807a87d07e1be3414f5ac61ac = $this->env->getExtension("native_profiler");
        $__internal_50a60d36c77d6369c75d3e74dcb85c570949fb5807a87d07e1be3414f5ac61ac->enter($__internal_50a60d36c77d6369c75d3e74dcb85c570949fb5807a87d07e1be3414f5ac61ac_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_50a60d36c77d6369c75d3e74dcb85c570949fb5807a87d07e1be3414f5ac61ac->leave($__internal_50a60d36c77d6369c75d3e74dcb85c570949fb5807a87d07e1be3414f5ac61ac_prof);

    }

    // line 27
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_d3c3e966687999591621595f3200247a24caab5f4b1932bd56624b30bd05ce19 = $this->env->getExtension("native_profiler");
        $__internal_d3c3e966687999591621595f3200247a24caab5f4b1932bd56624b30bd05ce19->enter($__internal_d3c3e966687999591621595f3200247a24caab5f4b1932bd56624b30bd05ce19_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 28
        echo "            <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/BaconDoodle/Resources/public/js/jquery-2.1.4.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
            <script src=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/BaconDoodle/Resources/public/js/jquery.color-2.1.2.min.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
            <script src=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/BaconDoodle/Resources/public/js/jscolor/jscolor.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
            <script src=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/BaconDoodle/Resources/public/js/colorWave.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
            <script src=\"https://code.createjs.com/easeljs-0.8.1.min.js\"></script>
            <script src=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/BaconDoodle/Resources/public/js/baconDoodle.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
        ";
        
        $__internal_d3c3e966687999591621595f3200247a24caab5f4b1932bd56624b30bd05ce19->leave($__internal_d3c3e966687999591621595f3200247a24caab5f4b1932bd56624b30bd05ce19_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 33,  126 => 31,  122 => 30,  118 => 29,  113 => 28,  107 => 27,  96 => 25,  86 => 14,  80 => 13,  71 => 35,  69 => 27,  66 => 26,  64 => 25,  58 => 22,  50 => 16,  48 => 13,  44 => 11,  40 => 9,  34 => 7,  32 => 6,  25 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <title>*/
/*             {% if data.title is defined %}*/
/*                 {{  data.title  }}*/
/*             {%  else %}*/
/*                 Welcome!*/
/*             {%  endif %}*/
/*         </title>*/
/* */
/*         {% block stylesheets %}*/
/*             <link type="text/css" rel="stylesheet" href="{{ asset('bundles/BaconDoodle/Resources/public/css/BaconDoodle.css') }}" />*/
/*         {% endblock %}*/
/* */
/*         <!-- Fonts -->*/
/*         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">*/
/*         <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>*/
/*         <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>*/
/* */
/*         <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/*     </head>*/
/*     <body>*/
/*         {% block body %}{% endblock %}*/
/* */
/*         {% block javascripts %}*/
/*             <script src="{{ asset('bundles/BaconDoodle/Resources/public/js/jquery-2.1.4.min.js') }}" type="text/javascript"></script>*/
/*             <script src="{{ asset('bundles/BaconDoodle/Resources/public/js/jquery.color-2.1.2.min.js') }}" type="text/javascript"></script>*/
/*             <script src="{{ asset('bundles/BaconDoodle/Resources/public/js/jscolor/jscolor.js') }}" type="text/javascript"></script>*/
/*             <script src="{{ asset('bundles/BaconDoodle/Resources/public/js/colorWave.js') }}" type="text/javascript"></script>*/
/*             <script src="https://code.createjs.com/easeljs-0.8.1.min.js"></script>*/
/*             <script src="{{ asset('bundles/BaconDoodle/Resources/public/js/baconDoodle.js') }}" type="text/javascript"></script>*/
/*         {% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
