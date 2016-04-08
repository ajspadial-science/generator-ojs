var generators = require('yeoman-generator');

var plugin = {
  name: 'examplePlugin',
  fullname: 'Example Plugin',
  description: 'A very silly example plugin',
  hooks: [
    'Templates::Manager::Index::ManagementPages',
    'Mail::send'
  ]
}

module.exports = generators.Base.extend({
  writing: function() {
    var mainPHPfile = plugin.name + '.php';
    
    console.log('Creating index.php');
    this.fs.copyTpl(
      this.templatePath('_index.php'),
      this.destinationPath('index.php'),
      plugin
    );

   console.log('Creating ' + mainPHPfile + "...");
   this.fs.copyTpl(
     this.templatePath('_templatePlugin.php'),
     this.destinationPath(mainPHPfile),
     plugin
   );
  },
});
