/* @author Z */

function Request(method, path, data, callback) {
  
  // defaults  
  this.method = typeof method !== 'undefined' ? method : "POST";
  this.path = typeof path !== 'undefined' ? baseball.base_path + path : null;
  this.dataType = "JSON";

  // add token if data present
  if (typeof data !== 'undefined') {
    data._token = baseball.token;
    this.data = JSON.parse(JSON.stringify(data));
  }
  else {
    this.data = null;
  }

  this.setDataType = function(dataType) {
    this.dataType = dataType;
  }

  this.setData = function(data) {
    this.data = data;
  }

  this.setCallback = function(callback) {
    this.callback = callback;
  }

  this.setData = function(data) {
    data._token = baseball.token;
    this.data = JSON.parse(JSON.stringify(data));
  }

  this.setMethod = function(method) {
    this.method = method;
  }

  this.setPath = function(path) {
    this.path = baseball.base_path + path;
  }

  this.getResponse = function() {
    return this.reponse;
  }

  this.execute = function() {
    var data = this.data;
    $.ajax({
      type: this.method,
      url: this.path,
      data: this.data,
      dataType: this.dataType
    }).done(function(response){
      baseball.response = response;
      callback(data);
    });
  }

};