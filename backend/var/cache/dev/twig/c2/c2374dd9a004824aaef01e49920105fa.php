<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* car/index.html.twig */
class __TwigTemplate_79f9636ed6de83a69ec1ae2a3f9c3425 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "car/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "car/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "car/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Car index";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "    <h1>Car index</h1>

    <table class=\"table\">
        <thead>
            <tr>
                <th>Mark</th>
                <th>Model</th>
                <th>Vendor</th>
                <th>Price</th>
                <th>Description</th>
                <th>Pictures</th>
                <th>Abs</th>
                <th>Epc</th>
                <th>GrayCard</th>
                <th>AutoGearBox</th>
                <th>Taxes</th>
                <th>Insurance</th>
                <th>Color</th>
                <th>MileAge</th>
                <th>Quantity</th>
                <th>AddDate</th>
                <th>SellDate</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 32
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cars"]) || array_key_exists("cars", $context) ? $context["cars"] : (function () { throw new RuntimeError('Variable "cars" does not exist.', 32, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["car"]) {
            // line 33
            echo "            <tr>
                <td>";
            // line 34
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["car"], "id", [], "any", false, false, false, 34), "html", null, true);
            echo "</td>
                <td>";
            // line 35
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["car"], "CarName", [], "any", false, false, false, 35), "html", null, true);
            echo "</td>
                <td>";
            // line 36
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["car"], "Mark", [], "any", false, false, false, 36), "html", null, true);
            echo "</td>
                <td>";
            // line 37
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["car"], "Model", [], "any", false, false, false, 37), "html", null, true);
            echo "</td>
                <td>";
            // line 38
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["car"], "Vendor", [], "any", false, false, false, 38), "html", null, true);
            echo "</td>
                <td>";
            // line 39
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["car"], "Price", [], "any", false, false, false, 39), "html", null, true);
            echo "</td>
                <td>";
            // line 40
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["car"], "Description", [], "any", false, false, false, 40), "html", null, true);
            echo "</td>
                <td>";
            // line 41
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["car"], "Pictures", [], "any", false, false, false, 41), "html", null, true);
            echo "</td>
                <td>";
            // line 42
            echo ((twig_get_attribute($this->env, $this->source, $context["car"], "Abs", [], "any", false, false, false, 42)) ? ("Yes") : ("No"));
            echo "</td>
                <td>";
            // line 43
            echo ((twig_get_attribute($this->env, $this->source, $context["car"], "Epc", [], "any", false, false, false, 43)) ? ("Yes") : ("No"));
            echo "</td>
                <td>";
            // line 44
            echo ((twig_get_attribute($this->env, $this->source, $context["car"], "GrayCard", [], "any", false, false, false, 44)) ? ("Yes") : ("No"));
            echo "</td>
                <td>";
            // line 45
            echo ((twig_get_attribute($this->env, $this->source, $context["car"], "AutoGearBox", [], "any", false, false, false, 45)) ? ("Yes") : ("No"));
            echo "</td>
                <td>";
            // line 46
            echo ((twig_get_attribute($this->env, $this->source, $context["car"], "Taxes", [], "any", false, false, false, 46)) ? ("Yes") : ("No"));
            echo "</td>
                <td>";
            // line 47
            echo ((twig_get_attribute($this->env, $this->source, $context["car"], "Insurance", [], "any", false, false, false, 47)) ? ("Yes") : ("No"));
            echo "</td>
                <td>";
            // line 48
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["car"], "Color", [], "any", false, false, false, 48), "html", null, true);
            echo "</td>
                <td>";
            // line 49
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["car"], "MileAge", [], "any", false, false, false, 49), "html", null, true);
            echo "</td>
                <td>";
            // line 50
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["car"], "Quantity", [], "any", false, false, false, 50), "html", null, true);
            echo "</td>
                <td>";
            // line 51
            ((twig_get_attribute($this->env, $this->source, $context["car"], "AddDate", [], "any", false, false, false, 51)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["car"], "AddDate", [], "any", false, false, false, 51), "Y-m-d H:i:s"), "html", null, true))) : (print ("")));
            echo "</td>
                <td>";
            // line 52
            ((twig_get_attribute($this->env, $this->source, $context["car"], "SellDate", [], "any", false, false, false, 52)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["car"], "SellDate", [], "any", false, false, false, 52), "Y-m-d H:i:s"), "html", null, true))) : (print ("")));
            echo "</td>
                <td>
                    <a href=\"";
            // line 54
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_car_show", ["id" => twig_get_attribute($this->env, $this->source, $context["car"], "id", [], "any", false, false, false, 54)]), "html", null, true);
            echo "\">show</a>
                    <a href=\"";
            // line 55
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_car_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["car"], "id", [], "any", false, false, false, 55)]), "html", null, true);
            echo "\">edit</a>
                </td>
            </tr>
        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 59
            echo "            <tr>
                <td colspan=\"20\">no records found</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['car'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        echo "        </tbody>
    </table>

    <a href=\"";
        // line 66
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_car_new");
        echo "\">Create new</a>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "car/index.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  228 => 66,  223 => 63,  214 => 59,  205 => 55,  201 => 54,  196 => 52,  192 => 51,  188 => 50,  184 => 49,  180 => 48,  176 => 47,  172 => 46,  168 => 45,  164 => 44,  160 => 43,  156 => 42,  152 => 41,  148 => 40,  144 => 39,  140 => 38,  136 => 37,  132 => 36,  128 => 35,  124 => 34,  121 => 33,  116 => 32,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Car index{% endblock %}

{% block body %}
    <h1>Car index</h1>

    <table class=\"table\">
        <thead>
            <tr>
                <th>Mark</th>
                <th>Model</th>
                <th>Vendor</th>
                <th>Price</th>
                <th>Description</th>
                <th>Pictures</th>
                <th>Abs</th>
                <th>Epc</th>
                <th>GrayCard</th>
                <th>AutoGearBox</th>
                <th>Taxes</th>
                <th>Insurance</th>
                <th>Color</th>
                <th>MileAge</th>
                <th>Quantity</th>
                <th>AddDate</th>
                <th>SellDate</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
        {% for car in cars %}
            <tr>
                <td>{{ car.id }}</td>
                <td>{{ car.CarName }}</td>
                <td>{{ car.Mark }}</td>
                <td>{{ car.Model }}</td>
                <td>{{ car.Vendor }}</td>
                <td>{{ car.Price }}</td>
                <td>{{ car.Description }}</td>
                <td>{{ car.Pictures }}</td>
                <td>{{ car.Abs ? 'Yes' : 'No' }}</td>
                <td>{{ car.Epc ? 'Yes' : 'No' }}</td>
                <td>{{ car.GrayCard ? 'Yes' : 'No' }}</td>
                <td>{{ car.AutoGearBox ? 'Yes' : 'No' }}</td>
                <td>{{ car.Taxes ? 'Yes' : 'No' }}</td>
                <td>{{ car.Insurance ? 'Yes' : 'No' }}</td>
                <td>{{ car.Color }}</td>
                <td>{{ car.MileAge }}</td>
                <td>{{ car.Quantity }}</td>
                <td>{{ car.AddDate ? car.AddDate|date('Y-m-d H:i:s') : '' }}</td>
                <td>{{ car.SellDate ? car.SellDate|date('Y-m-d H:i:s') : '' }}</td>
                <td>
                    <a href=\"{{ path('app_car_show', {'id': car.id}) }}\">show</a>
                    <a href=\"{{ path('app_car_edit', {'id': car.id}) }}\">edit</a>
                </td>
            </tr>
        {% else %}
            <tr>
                <td colspan=\"20\">no records found</td>
            </tr>
        {% endfor %}
        </tbody>
    </table>

    <a href=\"{{ path('app_car_new') }}\">Create new</a>
{% endblock %}
", "car/index.html.twig", "C:\\Users\\21696\\Documents\\SwiftWheels\\backend\\templates\\car\\index.html.twig");
    }
}
