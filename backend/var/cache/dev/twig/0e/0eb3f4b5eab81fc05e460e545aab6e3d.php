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

/* car/show.html.twig */
class __TwigTemplate_d46941168c43073f2bdafb36c936b63a extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "car/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "car/show.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "car/show.html.twig", 1);
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

        yield "Car";
        
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
        yield "    <h1>Car</h1>

    <table class=\"table\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>";
        // line 12
        yield Twig\Extension\EscaperExtension::escape($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new RuntimeError('Variable "car" does not exist.', 12, $this->source); })()), "id", [], "any", false, false, false, 12), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>CarName</th>
                <td>";
        // line 16
        yield Twig\Extension\EscaperExtension::escape($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new RuntimeError('Variable "car" does not exist.', 16, $this->source); })()), "CarName", [], "any", false, false, false, 16), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>Mark</th>
                <td>";
        // line 20
        yield Twig\Extension\EscaperExtension::escape($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new RuntimeError('Variable "car" does not exist.', 20, $this->source); })()), "Mark", [], "any", false, false, false, 20), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>Model</th>
                <td>";
        // line 24
        yield Twig\Extension\EscaperExtension::escape($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new RuntimeError('Variable "car" does not exist.', 24, $this->source); })()), "Model", [], "any", false, false, false, 24), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>Vendor</th>
                <td>";
        // line 28
        yield Twig\Extension\EscaperExtension::escape($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new RuntimeError('Variable "car" does not exist.', 28, $this->source); })()), "Vendor", [], "any", false, false, false, 28), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>";
        // line 32
        yield Twig\Extension\EscaperExtension::escape($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new RuntimeError('Variable "car" does not exist.', 32, $this->source); })()), "Price", [], "any", false, false, false, 32), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>";
        // line 36
        yield Twig\Extension\EscaperExtension::escape($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new RuntimeError('Variable "car" does not exist.', 36, $this->source); })()), "Description", [], "any", false, false, false, 36), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>Pictures</th>
                <td>";
        // line 40
        yield Twig\Extension\EscaperExtension::escape($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new RuntimeError('Variable "car" does not exist.', 40, $this->source); })()), "Pictures", [], "any", false, false, false, 40), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>Abs</th>
                <td>";
        // line 44
        yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new RuntimeError('Variable "car" does not exist.', 44, $this->source); })()), "Abs", [], "any", false, false, false, 44)) ? ("Yes") : ("No"));
        yield "</td>
            </tr>
            <tr>
                <th>Epc</th>
                <td>";
        // line 48
        yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new RuntimeError('Variable "car" does not exist.', 48, $this->source); })()), "Epc", [], "any", false, false, false, 48)) ? ("Yes") : ("No"));
        yield "</td>
            </tr>
            <tr>
                <th>GrayCard</th>
                <td>";
        // line 52
        yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new RuntimeError('Variable "car" does not exist.', 52, $this->source); })()), "GrayCard", [], "any", false, false, false, 52)) ? ("Yes") : ("No"));
        yield "</td>
            </tr>
            <tr>
                <th>AutoGearBox</th>
                <td>";
        // line 56
        yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new RuntimeError('Variable "car" does not exist.', 56, $this->source); })()), "AutoGearBox", [], "any", false, false, false, 56)) ? ("Yes") : ("No"));
        yield "</td>
            </tr>
            <tr>
                <th>Taxes</th>
                <td>";
        // line 60
        yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new RuntimeError('Variable "car" does not exist.', 60, $this->source); })()), "Taxes", [], "any", false, false, false, 60)) ? ("Yes") : ("No"));
        yield "</td>
            </tr>
            <tr>
                <th>Insurance</th>
                <td>";
        // line 64
        yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new RuntimeError('Variable "car" does not exist.', 64, $this->source); })()), "Insurance", [], "any", false, false, false, 64)) ? ("Yes") : ("No"));
        yield "</td>
            </tr>
            <tr>
                <th>Color</th>
                <td>";
        // line 68
        yield Twig\Extension\EscaperExtension::escape($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new RuntimeError('Variable "car" does not exist.', 68, $this->source); })()), "Color", [], "any", false, false, false, 68), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>MileAge</th>
                <td>";
        // line 72
        yield Twig\Extension\EscaperExtension::escape($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new RuntimeError('Variable "car" does not exist.', 72, $this->source); })()), "MileAge", [], "any", false, false, false, 72), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>Quantity</th>
                <td>";
        // line 76
        yield Twig\Extension\EscaperExtension::escape($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new RuntimeError('Variable "car" does not exist.', 76, $this->source); })()), "Quantity", [], "any", false, false, false, 76), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>AddDate</th>
                <td>";
        // line 80
        ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new RuntimeError('Variable "car" does not exist.', 80, $this->source); })()), "AddDate", [], "any", false, false, false, 80)) ? (yield Twig\Extension\EscaperExtension::escape($this->env, Twig\Extension\CoreExtension::dateFormatFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new RuntimeError('Variable "car" does not exist.', 80, $this->source); })()), "AddDate", [], "any", false, false, false, 80), "Y-m-d H:i:s"), "html", null, true)) : (yield ""));
        yield "</td>
            </tr>
            <tr>
                <th>SellDate</th>
                <td>";
        // line 84
        ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new RuntimeError('Variable "car" does not exist.', 84, $this->source); })()), "SellDate", [], "any", false, false, false, 84)) ? (yield Twig\Extension\EscaperExtension::escape($this->env, Twig\Extension\CoreExtension::dateFormatFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new RuntimeError('Variable "car" does not exist.', 84, $this->source); })()), "SellDate", [], "any", false, false, false, 84), "Y-m-d H:i:s"), "html", null, true)) : (yield ""));
        yield "</td>
            </tr>
        </tbody>
    </table>

    <a href=\"";
        // line 89
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_car_index");
        yield "\">back to list</a>

    <a href=\"";
        // line 91
        yield Twig\Extension\EscaperExtension::escape($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_car_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new RuntimeError('Variable "car" does not exist.', 91, $this->source); })()), "id", [], "any", false, false, false, 91)]), "html", null, true);
        yield "\">edit</a>

    ";
        // line 93
        yield Twig\Extension\CoreExtension::include($this->env, $context, "car/_delete_form.html.twig");
        yield "
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
        return "car/show.html.twig";
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
        return array (  242 => 93,  237 => 91,  232 => 89,  224 => 84,  217 => 80,  210 => 76,  203 => 72,  196 => 68,  189 => 64,  182 => 60,  175 => 56,  168 => 52,  161 => 48,  154 => 44,  147 => 40,  140 => 36,  133 => 32,  126 => 28,  119 => 24,  112 => 20,  105 => 16,  98 => 12,  90 => 6,  80 => 5,  60 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Car{% endblock %}

{% block body %}
    <h1>Car</h1>

    <table class=\"table\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>{{ car.id }}</td>
            </tr>
            <tr>
                <th>CarName</th>
                <td>{{ car.CarName }}</td>
            </tr>
            <tr>
                <th>Mark</th>
                <td>{{ car.Mark }}</td>
            </tr>
            <tr>
                <th>Model</th>
                <td>{{ car.Model }}</td>
            </tr>
            <tr>
                <th>Vendor</th>
                <td>{{ car.Vendor }}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>{{ car.Price }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ car.Description }}</td>
            </tr>
            <tr>
                <th>Pictures</th>
                <td>{{ car.Pictures }}</td>
            </tr>
            <tr>
                <th>Abs</th>
                <td>{{ car.Abs ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <th>Epc</th>
                <td>{{ car.Epc ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <th>GrayCard</th>
                <td>{{ car.GrayCard ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <th>AutoGearBox</th>
                <td>{{ car.AutoGearBox ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <th>Taxes</th>
                <td>{{ car.Taxes ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <th>Insurance</th>
                <td>{{ car.Insurance ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <th>Color</th>
                <td>{{ car.Color }}</td>
            </tr>
            <tr>
                <th>MileAge</th>
                <td>{{ car.MileAge }}</td>
            </tr>
            <tr>
                <th>Quantity</th>
                <td>{{ car.Quantity }}</td>
            </tr>
            <tr>
                <th>AddDate</th>
                <td>{{ car.AddDate ? car.AddDate|date('Y-m-d H:i:s') : '' }}</td>
            </tr>
            <tr>
                <th>SellDate</th>
                <td>{{ car.SellDate ? car.SellDate|date('Y-m-d H:i:s') : '' }}</td>
            </tr>
        </tbody>
    </table>

    <a href=\"{{ path('app_car_index') }}\">back to list</a>

    <a href=\"{{ path('app_car_edit', {'id': car.id}) }}\">edit</a>

    {{ include('car/_delete_form.html.twig') }}
{% endblock %}
", "car/show.html.twig", "C:\\Users\\21696\\Documents\\SwiftWheels\\backend\\templates\\car\\show.html.twig");
    }
}
