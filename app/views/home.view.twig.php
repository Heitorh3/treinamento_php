{% extends "index.view.php" %}

{% block title %}{{title}}{% endblock %}

{% block head %}
  {{ parent() }}
  <style type="text/css">
    .important {
      color: #336699;
    }
  </style>
{% endblock %}


{% block content %}
  <h3>{{subtitle}}</h3>
  <span>{{description}}</span>

  <ul>
    {% for user in users %}
    <li>
      <a href='user/{{user.id}}/show'>
        {{ user.name }}
      </a>
    </li>
    {% else %}
    <li><em>no user found</em></li>
    {% endfor %}
  </ul>

  <p class="important">
    Welcome to my awesome homepage.
  </p>
  {{links}}
{% endblock %}