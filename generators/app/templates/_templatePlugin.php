<?php
  import('classes.plugin.GenericPlugin');
  class <%= name %> extends GenericPlugin {
    function register($category, $path) {
      if (parent::register($category, $path) {
        <% hooks.forEach(function(hook){ %>
          HookRegistry::register(
            '<%= hook %>',
            array($this, '<%= hook.replace(/::/g, "_") %>_callback')
          );
        <% }); %>
        return true;
      }
      return false;
    }

    function getName() {
      return '<%= name %>';
    }

    function getDisplayName() {
      return '<%= fullname %>';
    }

    function getDescription() {
      return '<%= description %>';
    }
  
  <% hooks.forEach(function(hook) { %> 
    function <%= hook.replace(/::/g, "_") %>_callback($hookName, $args) {
      // ...
    }
  <% }); %>
  }
?>
