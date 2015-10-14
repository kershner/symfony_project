<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_89700dec0c8182aede889f63cc10d34c06dd3491f1c0442e87ea4e3d65719559 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("TwigBundle::layout.html.twig", "TwigBundle:Exception:exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_3b61ff176be673b6c7d284d9a63435cfa9205c4cacb936a1420dd5dccf1badf3 = $this->env->getExtension("native_profiler");
        $__internal_3b61ff176be673b6c7d284d9a63435cfa9205c4cacb936a1420dd5dccf1badf3->enter($__internal_3b61ff176be673b6c7d284d9a63435cfa9205c4cacb936a1420dd5dccf1badf3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_3b61ff176be673b6c7d284d9a63435cfa9205c4cacb936a1420dd5dccf1badf3->leave($__internal_3b61ff176be673b6c7d284d9a63435cfa9205c4cacb936a1420dd5dccf1badf3_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_1027f68bdc57e076fbf31d0353e524aa7af1e19a57f4a763e97e1669800053bf = $this->env->getExtension("native_profiler");
        $__internal_1027f68bdc57e076fbf31d0353e524aa7af1e19a57f4a763e97e1669800053bf->enter($__internal_1027f68bdc57e076fbf31d0353e524aa7af1e19a57f4a763e97e1669800053bf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_1027f68bdc57e076fbf31d0353e524aa7af1e19a57f4a763e97e1669800053bf->leave($__internal_1027f68bdc57e076fbf31d0353e524aa7af1e19a57f4a763e97e1669800053bf_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_058880c72291a6d8c33078378c25385e7d023c03cf19411e8145bf47b9ed260f = $this->env->getExtension("native_profiler");
        $__internal_058880c72291a6d8c33078378c25385e7d023c03cf19411e8145bf47b9ed260f->enter($__internal_058880c72291a6d8c33078378c25385e7d023c03cf19411e8145bf47b9ed260f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_058880c72291a6d8c33078378c25385e7d023c03cf19411e8145bf47b9ed260f->leave($__internal_058880c72291a6d8c33078378c25385e7d023c03cf19411e8145bf47b9ed260f_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_a2335969f57be68f866e9f445a8f67d056371921dde1833a3338b035417647bf = $this->env->getExtension("native_profiler");
        $__internal_a2335969f57be68f866e9f445a8f67d056371921dde1833a3338b035417647bf->enter($__internal_a2335969f57be68f866e9f445a8f67d056371921dde1833a3338b035417647bf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("TwigBundle:Exception:exception.html.twig", "TwigBundle:Exception:exception_full.html.twig", 12)->display($context);
        
        $__internal_a2335969f57be68f866e9f445a8f67d056371921dde1833a3338b035417647bf->leave($__internal_a2335969f57be68f866e9f445a8f67d056371921dde1833a3338b035417647bf_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends 'TwigBundle::layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include 'TwigBundle:Exception:exception.html.twig' %}*/
/* {% endblock %}*/
/* */
