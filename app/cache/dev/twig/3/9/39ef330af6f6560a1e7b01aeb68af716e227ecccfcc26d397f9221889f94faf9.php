<?php

/* base.html.twig */
class __TwigTemplate_ad89d370797dcbb0954a4d6ec8794056d665a0b0bc05c09cff6b5afa63835b3f extends Twig_Template
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
        $__internal_71730d0aef797562696c3eefef950d72f2b5d75e4b22b5a1b60fe079c25fe522 = $this->env->getExtension("native_profiler");
        $__internal_71730d0aef797562696c3eefef950d72f2b5d75e4b22b5a1b60fe079c25fe522->enter($__internal_71730d0aef797562696c3eefef950d72f2b5d75e4b22b5a1b60fe079c25fe522_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

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
        
        $__internal_71730d0aef797562696c3eefef950d72f2b5d75e4b22b5a1b60fe079c25fe522->leave($__internal_71730d0aef797562696c3eefef950d72f2b5d75e4b22b5a1b60fe079c25fe522_prof);

    }

    // line 13
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_b38674d4f2b95b7f6537687d5edfe55da38f867394393c2e69a642142254167b = $this->env->getExtension("native_profiler");
        $__internal_b38674d4f2b95b7f6537687d5edfe55da38f867394393c2e69a642142254167b->enter($__internal_b38674d4f2b95b7f6537687d5edfe55da38f867394393c2e69a642142254167b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 14
        echo "            <link type=\"text/css\" rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("bundles/BaconDoodle/Resources/public/css/BaconDoodle.css"), "html", null, true);
        echo "\" />
        ";
        
        $__internal_b38674d4f2b95b7f6537687d5edfe55da38f867394393c2e69a642142254167b->leave($__internal_b38674d4f2b95b7f6537687d5edfe55da38f867394393c2e69a642142254167b_prof);

    }

    // line 25
    public function block_body($context, array $blocks = array())
    {
        $__internal_a86ca3ed4b144ddd5a1fe59b765a2fdacd0eef2cd4c439b12ac620a13c157d0f = $this->env->getExtension("native_profiler");
        $__internal_a86ca3ed4b144ddd5a1fe59b765a2fdacd0eef2cd4c439b12ac620a13c157d0f->enter($__internal_a86ca3ed4b144ddd5a1fe59b765a2fdacd0eef2cd4c439b12ac620a13c157d0f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_a86ca3ed4b144ddd5a1fe59b765a2fdacd0eef2cd4c439b12ac620a13c157d0f->leave($__internal_a86ca3ed4b144ddd5a1fe59b765a2fdacd0eef2cd4c439b12ac620a13c157d0f_prof);

    }

    // line 27
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_6f92627189796ab3d29b5d251d64858a21257f7ccd684f7bf1b599efe9df0f96 = $this->env->getExtension("native_profiler");
        $__internal_6f92627189796ab3d29b5d251d64858a21257f7ccd684f7bf1b599efe9df0f96->enter($__internal_6f92627189796ab3d29b5d251d64858a21257f7ccd684f7bf1b599efe9df0f96_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

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
        
        $__internal_6f92627189796ab3d29b5d251d64858a21257f7ccd684f7bf1b599efe9df0f96->leave($__internal_6f92627189796ab3d29b5d251d64858a21257f7ccd684f7bf1b599efe9df0f96_prof);

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
