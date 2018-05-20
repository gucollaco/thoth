function roundRect(ctx, x, y, width, height, radius, fill, stroke) {
	if (typeof stroke == 'undefined') {
	  stroke = true;
	}
	if (typeof radius === 'undefined') {
	  radius = 5;
	}
	if (typeof radius === 'number') {
	  radius = {tl: radius, tr: radius, br: radius, bl: radius};
	} else {
	  var defaultRadius = {tl: 0, tr: 0, br: 0, bl: 0};
	  for (var side in defaultRadius) {
		radius[side] = radius[side] || defaultRadius[side];
	  }
	}
	ctx.beginPath();
	ctx.moveTo(x + radius.tl, y);
	ctx.lineTo(x + width - radius.tr, y);
	ctx.quadraticCurveTo(x + width, y, x + width, y + radius.tr);
	ctx.lineTo(x + width, y + height - radius.br);
	ctx.quadraticCurveTo(x + width, y + height, x + width - radius.br, y + height);
	ctx.lineTo(x + radius.bl, y + height);
	ctx.quadraticCurveTo(x, y + height, x, y + height - radius.bl);
	ctx.lineTo(x, y + radius.tl);
	ctx.quadraticCurveTo(x, y, x + radius.tl, y);
	ctx.closePath();
	if (fill) {
	  ctx.fill();
	}
	if (stroke) {
	  ctx.stroke();
	}
  
  }

(function webpackUniversalModuleDefinition(root, factory) {
	if(typeof exports === 'object' && typeof module === 'object')
		module.exports = factory();
	else if(typeof define === 'function' && define.amd)
		define([], factory);
	else if(typeof exports === 'object')
		exports["ImageMapHighlighter"] = factory();
	else
		root["ImageMapHighlighter"] = factory();
})(this, function() {
return /******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};

/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {

/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;

/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			exports: {},
/******/ 			id: moduleId,
/******/ 			loaded: false
/******/ 		};

/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

/******/ 		// Flag the module as loaded
/******/ 		module.loaded = true;

/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}


/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;

/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;

/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";

/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports) {

	'use strict';

	var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

	function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

	var ImageMapHighlighter = function () {
	    /**
	     * @param {HTMLImageElement} element
	     * @param {Object} options
	     */
	    function ImageMapHighlighter(element) {
	        var options = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};

	        _classCallCheck(this, ImageMapHighlighter);

	        this.element = element;
			this.options = Object.assign({}, this._getDefaultOptions(), options);
			this._drawn = [];
			this._lastClick = undefined;
			this.groups = [];
			this.textos = [];
			this._selectedIndex = undefined;
			this._selected = undefined;
	    }

	    /**
	     * Convert the image into a canvas that animates when you hover over parts
	     * of it.
	     */


	    _createClass(ImageMapHighlighter, [{
	        key: 'init',
	        value: function init() {
	            var _this = this;

	            // Get the HTML map element associated with the given image element.
	            var map = this._getAssociatedMap(this.element);

	            // Create a shiny new canvas with the same dimensions as the image.
	            var canvas = this._createCanvasFor(this.element);

	            // Create a container element and move the image element as well as
	            // our shiny new canvas into it.
	            var container = this._createContainerFor(this.element);
	            this.element.parentNode.insertBefore(container, this.element);
	            container.appendChild(this.element);
	            container.insertBefore(canvas, this.element);

	            if (this.options.alwaysOn) {
	                for (var i = 0; i < map.areas.length; i++) {
	                    var area = map.areas[i];

	                    this._drawHighlightByArea(canvas, area);
	                }
	            } else {
	                // Animate the canvas accordingly every time we hover over an image
	                // mapping.
	                map.addEventListener('mouseover', function (event) {
	                    // _this._clearHighlights(canvas);
	                    _this._drawHighlightByArea(canvas, event.target);
	                });

	                // Clear the canvas when we hover off a mapping.
	                map.addEventListener('mouseout', function (event) {
						_this._clearHighlights(canvas);
						_this._drawn.forEach(function(item, index){
							_this._drawHighlightByArea(canvas, item);
						});

						_this._writeText(canvas);
					});

					
					map.addEventListener('click', function(event){
						var isGroup = false;
						var groupHere = undefined;
						var groupIndex = undefined;
						var coords = event.target.coords.split(',').map(function (coord) {
							return parseInt(coord);
						});

						var gridWidth = parseInt(event.target.attributes['gridWidth'].value);
						var gridSize = parseInt(event.target.attributes['gridSize'].value);

						var nCol = Math.ceil(gridWidth/gridSize);
						var idArea = function(i, j, n){
							return i + j*n;
						};

						_this.groups.forEach(function(item, index){
							var item0 = idArea(item[0][0], item[0][1], nCol);
							var itemN = idArea(item[1][0], item[1][1], nCol);
							var itemI = idArea(coords[0], coords[1], nCol);
							
							if(item0 <= itemI && itemI <= itemN){
								// console.log([item0, itemI, itemN]);
								isGroup = true;
								groupHere = item;
								groupIndex = index;
							}
						});

						// console.log(isGroup);


						if(!isGroup){
							_this._drawHighlightLine(canvas, event.target);			
						}else{
							if(_this._selected == groupHere){
								_this._selected = undefined

								$("#remove-highlight").prop('disabled', true);
								$("#remove-highlight").text("Remover Highlight");
							}
							else{
								_this._selected = groupHere;
								_this._selectedIndex = groupIndex;
							}
						}

						_this._clearHighlights(canvas);
						_this._drawn.forEach(function(item, index){
							_this._drawHighlightByArea(canvas, item);
						});

						_this._writeText(canvas);	
					});
	            }
	        }
	    }, {
			key: '_writeText',
	        value: function _writeText(canvas) {
				var context = canvas.getContext('2d');

				if(this._selected != undefined){
					var groupHere = this._selected;
					var groupIndex = this._selectedIndex + 1;

					var gridWidth = canvas.attributes['outerWidth'];
					var gridSize = 30;

					var minArea = groupHere[0];
					var maxArea = groupHere[1];

					for(var j = minArea[1]; j <= maxArea[1]; j+= gridSize){
						var minX = minArea[0];
						if(j > minArea[1]){
							minX = 0;
						}
						var nExactCol = Math.floor(gridWidth/gridSize);

						var maxX = nExactCol * gridSize;
						if(j == maxArea[1]){
							maxX = maxArea[0]
						}

						for(var i = minX; i <= maxX; i += gridSize){
							var idElement = 'area' + i + ',' + j;
							var curr_area = document.getElementById(idElement);
							if(curr_area != undefined){
								// this._selected.push(curr_area);
								var context = canvas.getContext('2d');
				
								var coords = curr_area.coords.split(',').map(function (coord) {
									return parseInt(coord);
								});
				
								context.fillStyle = "rgba(255, 0, 0, 0.3)";
								context.fillRect(coords[0], coords[1], coords[2] - coords[0], coords[3] - coords[1]);
							}
						}
					}

					$("#remove-highlight").prop('disabled', false);
					$("#remove-highlight").text("Remover Highlight " + groupIndex);
				}

				context.font="25px Calibri";
				
				this.textos.forEach(function(item, index){
					context.fillStyle = 'rgb(204, 0, 0)';
					// context.fillStyle = 'rgb(0, 102, 204)';
					roundRect(context, canvas.attributes['outerWidth'] + 5, item[2] - 22, 30, 30, 3.5, true, false);
					// context.fillRect(canvas.attributes['outerWidth'], item[2] - 22, 30, 30);
	
					context.fillStyle = "rgb(255, 255, 255)";
					context.fillText(item[0], item[1] + 5, item[2]);
				});			
			}
		}, {
	        key: '_getDefaultOptions',
	        value: function _getDefaultOptions() {
	            return {
	                fill: true,
	                fillColor: '000000',
	                fillOpacity: 1,
	                stroke: true,
	                strokeColor: 'ff0000',
	                strokeOpacity: 1,
	                strokeWidth: 1,
	                alwaysOn: false
	            };
	        }

	        /**
	         * Create and return a new HTML div element.
	         *
	         * @param {HTMLImageElement} element
	         * @returns {HTMLDivElement}
	         * @private
	         */

	    }, {
	        key: 'removeSelectedHighlight',
	        value: function removeSelectedHighlight() {
				idx= parseInt($("#remove-highlight").text().replace("Remover Highlight "));
				this._drawn.splice(idx, 1);
	        }

	        /**
	         * Create and return a new HTML div element.
	         *
	         * @param {HTMLImageElement} element
	         * @returns {HTMLDivElement}
	         * @private
	         */

	    }, {
	        key: '_createContainerFor',
	        value: function _createContainerFor(element) {
	            var container = document.createElement('div');
	            container.classList.add('map-container');
	            container.style.backgroundImage = 'url(' + element.src + ')';
	            container.style.height = element.height + 'px';
	            container.style.width = element.width + 'px';
	            return container;
	        }

	        /**
	         * Create and return a new HTML canvas element.
	         *
	         * @param {HTMLImageElement} element
	         * @returns {HTMLCanvasElement}
	         * @private
	         */

	    }, {
	        key: '_createCanvasFor',
	        value: function _createCanvasFor(element) {
	            var canvas = document.createElement('canvas');
	            canvas.height = element.height;
				canvas.width = element.width + 35;
				canvas.attributes['outerWidth'] = element.width;
	            return canvas;
	        }

	        /**
	         * Return the HTML map element referenced by the given HTML image element.
	         *
	         * @param {HTMLImageElement} element
	         * @returns {HTMLMapElement}
	         * @private
	         */

	    }, {
	        key: '_getAssociatedMap',
	        value: function _getAssociatedMap(element) {
	            if (!element.useMap) {
	                throw new Error('The "useMap" attribute for this image element has not been set.');
	            }

	            var map = document.querySelector('map[name=' + element.useMap.substr(1) + ']');
	            if (map === null) {
	                throw new Error('The requested map "' + element.useMap + '" could not be found.');
	            }

	            return map;
	        }

	        /**
	         * Clear the canvas.
	         *
	         * @param {HTMLCanvasElement} canvas
	         * @private
	         */

	    }, {
	        key: '_clearHighlights',
	        value: function _clearHighlights(canvas) {
	            var context = canvas.getContext('2d');
				context.clearRect(0, 0, canvas.width, canvas.height);
				
				// redesenhar os textos
	        }

	        /**
	         * Draw the map area co-ordinates onto the provided HTML canvas element.
	         *
	         * @param {HTMLCanvasElement} canvas
	         * @param {HTMLAreaElement} area
	         * @private
	         */

	    }, {
	        key: '_drawHighlightByArea',
	        value: function _drawHighlightByArea(canvas, area) {
	            var coords = area.coords.split(',').map(function (coord) {
	                return parseInt(coord);
	            });
	            var shape = area.shape;

	            this._drawHighlight(canvas, shape, coords);
	        }

	        /**
	         * Draw a highlight onto the provided HTML canvas element.
	         *
	         * @param {HTMLCanvasElement} canvas
	         * @param {String} shape
	         * @param {Array} coords
	         * @private
	         */

	    }, {
	        key: '_drawHighlightLine',
	        value: function _drawHighlightLine(canvas, area) {
				if(this._lastClick == undefined){
					this._lastClick = area;
				}else{
					console.log(area);
					var gridId = this._lastClick.attributes['gridId'].value;
					var coords0 = gridId.split(',').map(function (coord) {
						    return parseInt(coord);
						});

					gridId = area.attributes['gridId'].value;
					var coordsN = gridId.split(',').map(function (coord) {
							return parseInt(coord);
						});

					console.log([coords0, coordsN]);

					// var gridWidth = parseInt(area.attributes['gridWidth'].value);]
					var gridWidth = parseInt(canvas.attributes['outerWidth']);
					var gridSize = parseInt(area.attributes['gridSize'].value);

					var nCol = Math.ceil(gridWidth/gridSize);
					var nExactCol = Math.floor(gridWidth/gridSize);
					var idArea = function(i, j, n){
						return i + j*n;
					};

					var minArea = coords0;
					var maxArea = coordsN;
					if(idArea(coordsN[0], coordsN[1], nCol) < idArea(coords0[0], coords0[1], nCol)){
						minArea = coordsN;
						maxArea	= coords0;
					}


					var isGroup = false;
					this.groups.forEach(function(item, index){
						var item0 = idArea(item[0][0], item[0][1], nCol);
						var itemN = idArea(item[1][0], item[1][1], nCol);
						var itemI = idArea(minArea[0], minArea[1], nCol);
						
						if(item0 <= itemI && itemI <= itemN){
							// console.log([item0, itemI, itemN]);
							isGroup = true;
						}
					});

					if(!isGroup){
						this.groups.push([minArea, maxArea]);
						this.textos.push([this.groups.length.toString(), gridWidth + 9, minArea[1] + (gridSize/4)]);

						$('#highlights').append('<hightlight number=' + this.groups.length.toString() + ' group="' + minArea[0] + ',' + minArea[1] + ',' + maxArea[0] + ',' + maxArea[1] + '"/>');

						for(var j = minArea[1]; j <= maxArea[1]; j+= gridSize){
							var minX = minArea[0];
							if(j > minArea[1]){
								minX = 0;
							}

							var maxX = nExactCol * gridSize;
							if(j == maxArea[1]){
								maxX = maxArea[0]
							}

							for(var i = minX; i <= maxX; i += gridSize){
								var idElement = 'area' + i + ',' + j;
								var curr_area = document.getElementById(idElement);
								// console.log([idElement]);
								// this._drawHighlightByArea(canvas, curr_area);
								if(curr_area != undefined){
									this._drawn.push(curr_area);
								}
							}
						}
					}

					this._lastClick = undefined;
				}
	        }

	        /**
	         * Draw a highlight onto the provided HTML canvas element.
	         *
	         * @param {HTMLCanvasElement} canvas
	         * @param {String} shape
	         * @param {Array} coords
	         * @private
	         */

	    }, {
	        key: '_drawHighlight',
	        value: function _drawHighlight(canvas, shape, coords) {
				var context = canvas.getContext('2d');
			
	            context.beginPath();
	            switch (shape) {
	                case 'circle':
	                    context.arc(coords[0], coords[1], coords[2], 0, Math.PI * 2, false);
	                    break;
	                case 'poly':
	                    context.moveTo(coords[0], coords[1]);
	                    for (var i = 2; i < coords.length; i += 2) {
	                        context.lineTo(coords[i], coords[i + 1]);
	                    }
	                    break;
	                case 'rect':
	                    context.rect(coords[0], coords[1], coords[2] - coords[0], coords[3] - coords[1]);
	                    break;
	                default:
	            }
				context.closePath();
				
	            if (this.options.fill) {
					context.fillStyle = this.css3Colour(this.options.fillColor, 0.35);
	                context.fill();
				}


	        }

	        /**
	         * @param {String} hex
	         * @returns {Number}
	         */

	    }, {
	        key: 'hexToDecimal',
	        value: function hexToDecimal(hex) {
	            return Math.max(0, Math.min(parseInt(hex, 16), 255));
	        }

	        /**
	         * @param {String} colour
	         * @param {Number} opacity
	         * @returns {String}
	         */

	    }, {
	        key: 'css3Colour',
	        value: function css3Colour(colour, opacity) {
	            var r = +this.hexToDecimal(colour.substr(0, 2));
	            var g = +this.hexToDecimal(colour.substr(2, 2));
	            var b = +this.hexToDecimal(colour.substr(4, 2));

	            return 'rgba(' + r + ', ' + g + ', ' + b + ', ' + opacity + ')';
	        }
	    }]);

	    return ImageMapHighlighter;
	}();

	module.exports = ImageMapHighlighter;

/***/ }
/******/ ])
});
;