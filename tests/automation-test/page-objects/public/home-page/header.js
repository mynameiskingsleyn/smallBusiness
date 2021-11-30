//page objects
var Header = function(){}

Header.prototype = Object.create({},{
  appBrand: {get: function(){return element(by.css('#app-brand'))}},
});

module.exports = Header
