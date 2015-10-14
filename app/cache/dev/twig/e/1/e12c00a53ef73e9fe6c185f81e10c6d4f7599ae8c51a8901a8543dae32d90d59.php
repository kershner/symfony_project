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
        $__internal_2a23c17bbb0eed8a2568661ad5b3b246222e33e901ca7977ee6bcca5598b7658 = $this->env->getExtension("native_profiler");
        $__internal_2a23c17bbb0eed8a2568661ad5b3b246222e33e901ca7977ee6bcca5598b7658->enter($__internal_2a23c17bbb0eed8a2568661ad5b3b246222e33e901ca7977ee6bcca5598b7658_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_2a23c17bbb0eed8a2568661ad5b3b246222e33e901ca7977ee6bcca5598b7658->leave($__internal_2a23c17bbb0eed8a2568661ad5b3b246222e33e901ca7977ee6bcca5598b7658_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_5a083774c156c0a23fb6759275317e734d70f33241def37b51263f91b0ccd682 = $this->env->getExtension("native_profiler");
        $__internal_5a083774c156c0a23fb6759275317e734d70f33241def37b51263f91b0ccd682->enter($__internal_5a083774c156c0a23fb6759275317e734d70f33241def37b51263f91b0ccd682_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_5a083774c156c0a23fb6759275317e734d70f33241def37b51263f91b0ccd682->leave($__internal_5a083774c156c0a23fb6759275317e734d70f33241def37b51263f91b0ccd682_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_c8e7147f2115102183f11ac15cfaea18861d07a2868edcd3ab72bdb7180f50fc = $this->env->getExtension("native_profiler");
        $__internal_c8e7147f2115102183f11ac15cfaea18861d07a2868edcd3ab72bdb7180f50fc->enter($__internal_c8e7147f2115102183f11ac15cfaea18861d07a2868edcd3ab72bdb7180f50fc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_c8e7147f2115102183f11ac15cfaea18861d07a2868edcd3ab72bdb7180f50fc->leave($__internal_c8e7147f2115102183f11ac15cfaea18861d07a2868edcd3ab72bdb7180f50fc_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_ae20e2f0151721066b691fde36e256f22ab452d9886e2c8f5cbb334d5b8bb9fa = $this->env->getExtension("native_profiler");
        $__internal_ae20e2f0151721066b691fde36e256f22ab452d9886e2c8f5cbb334d5b8bb9fa->enter($__internal_ae20e2f0151721066b691fde36e256f22ab452d9886e2c8f5cbb334d5b8bb9fa_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("TwigBundle:Exception:exception.html.twig", "TwigBundle:Exception:exception_full.html.twig", 12)->display($context);
        
        $__internal_ae20e2f0151721066b691fde36e256f22ab452d9886e2c8f5cbb334d5b8bb9fa->leave($__internal_ae20e2f0151721066b691fde36e256f22ab452d9886e2c8f5cbb334d5b8bb9fa_prof);

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
