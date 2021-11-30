//page objects
var BasePage = function(){}

BasePage.prototype = Object.create({},{
  baseUrl: {get: function(){return 'http://local.sbws.com/'}}
});

module.exports = BasePage
