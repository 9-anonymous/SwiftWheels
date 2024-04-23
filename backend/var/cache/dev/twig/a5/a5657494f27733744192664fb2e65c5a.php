<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* car/index.html.twig */
class __TwigTemplate_3ca9222c04eaf7029efe3c1dba1b08ad extends Template
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
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
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

        yield "Car index";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        return; yield '';
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
        yield "    <h1>Car index</h1>

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
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["cars"]) || array_key_exists("cars", $context) ? $context["cars"] : (function () { throw new RuntimeError('Variable "cars" does not exist.', 32, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["car"]) {
            // line 33
            yield "            <tr>
                <td>";
            // line 34
            yield Twig\Extension\EscaperExtension::escape($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["car"], "id", [], "any", false, false, false, 34), "html", null, true);
            yield "</td>
                <td>";
            // line 35
            yield Twig\Extension\EscaperExtension::escape($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["car"], "CarName", [], "any", false, false, false, 35), "html", null, true);
            yield "</td>
                <td>";
            // line 36
            yield Twig\Extension\EscaperExtension::escape($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["car"], "Mark", [], "any", false, false, false, 36), "html", null, true);
            yield "</td>
                <td>";
            // line 37
            yield Twig\Extension\EscaperExtension::escape($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["car"], "Model", [], "any", false, false, false, 37), "html", null, true);
            yield "</td>
                <td>";
            // line 38
            yield Twig\Extension\EscaperExtension::escape($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["car"], "Vendor", [], "any", false, false, false, 38), "html", null, true);
            yield "</td>
                <td>";
            // line 39
            yield Twig\Extension\EscaperExtension::escape($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["car"], "Price", [], "any", false, false, false, 39), "html", null, true);
            yield "</td>
                <td>";
            // line 40
            yield Twig\Extension\EscaperExtension::escape($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["car"], "Description", [], "any", false, false, false, 40), "html", null, true);
            yield "</td>
                <td>";
            // line 41
            yield Twig\Extension\EscaperExtension::escape($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["car"], "Pictures", [], "any", false, false, false, 41), "html", null, true);
            yield "</td>
                <td>";
            // line 42
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["car"], "Abs", [], "any", false, false, false, 42)) ? ("Yes") : ("No"));
            yield "</td>
                <td>";
            // line 43
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["car"], "Epc", [], "any", false, false, false, 43)) ? ("Yes") : ("No"));
            yield "</td>
                <td>";
            // line 44
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["car"], "GrayCard", [], "any", false, false, false, 44)) ? ("Yes") : ("No"));
            yield "</td>
                <td>";
            // line 45
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["car"], "AutoGearBox", [], "any", false, false, false, 45)) ? ("Yes") : ("No"));
            yield "</td>
                <td>";
            // line 46
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["car"], "Taxes", [], "any", false, false, false, 46)) ? ("Yes") : ("No"));
            yield "</td>
                <td>";
            // line 47
            yield ((CoreExtension::getAttribute($this->env, $this->source, $context["car"], "Insurance", [], "any", false, false, false, 47)) ? ("Yes") : ("No"));
            yield "</td>
                <td>";
            // line 48
            yield Twig\Extension\EscaperExtension::escape($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["car"], "Color", [], "any", false, false, false, 48), "html", null, true);
            yield "</td>
                <td>";
            // line 49
            yield Twig\Extension\EscaperExtension::escape($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["car"], "MileAge", [], "any", false, false, false, 49), "html", null, true);
            yield "</td>
                <td>";
            // line 50
            yield Twig\Extension\EscaperExtension::escape($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["car"], "Quantity", [], "any", false, false, false, 50), "html", null, true);
            yield "</td>
                <td>";
            // line 51
            ((CoreExtension::getAttribute($this->env, $this->source, $context["car"], "AddDate", [], "any", false, false, false, 51)) ? (yield Twig\Extension\EscaperExtension::escape($this->env, Twig\Extension\CoreExtension::dateFormatFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["car"], "AddDate", [], "any", false, false, false, 51), "Y-m-d H:i:s"), "html", null, true)) : (yield ""));
            yield "</td>
                <td>";
            // line 52
            ((CoreExtension::getAttribute($this->env, $this->source, $context["car"], "SellDate", [], "any", false, false, false, 52)) ? (yield Twig\Extension\EscaperExtension::escape($this->env, Twig\Extension\CoreExtension::dateFormatFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["car"], "SellDate", [], "any", false, false, false, 52), "Y-m-d H:i:s"), "html", null, true)) : (yield ""));
            yield "</td>
                <td>
                    <a href=\"";
            // line 54
            yield Twig\Extension\EscaperExtension::escape($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_car_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["car"], "id", [], "any", false, false, false, 54)]), "html", null, true);
            yield "\">show</a>
                    <a href=\"";
            // line 55
            yield Twig\Extension\EscaperExtension::escape($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_car_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["car"], "id", [], "any", false, false, false, 55)]), "html", null, true);
            yield "\">edit</a>
                </td>
            </tr>
        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 59
            yield "            <tr>
                <td colspan=\"20\">no records found</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['car'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        yield "        </tbody>
    </table>

    <a href=\"";
        // line 66
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_car_new");
        yield "\">Create new</a>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        return; yield '';
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
        return array (  230 => 66,  225 => 63,  216 => 59,  207 => 55,  203 => 54,  198 => 52,  194 => 51,  190 => 50,  186 => 49,  182 => 48,  178 => 47,  174 => 46,  170 => 45,  166 => 44,  162 => 43,  158 => 42,  154 => 41,  150 => 40,  146 => 39,  142 => 38,  138 => 37,  134 => 36,  130 => 35,  126 => 34,  123 => 33,  118 => 32,  90 => 6,  80 => 5,  60 => 3,  37 => 1,);
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
