'use strict';

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _react = require('react');

var _react2 = _interopRequireDefault(_react);

var _reactAddonsPureRenderMixin = require('react-addons-pure-render-mixin');

var _reactAddonsPureRenderMixin2 = _interopRequireDefault(_reactAddonsPureRenderMixin);

var _svgIcon = require('material-ui/lib/svg-icon');

var _svgIcon2 = _interopRequireDefault(_svgIcon);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

var ContentExpand = _react2.default.createClass({
    displayName: 'ContentExpand',
    mixins: [_reactAddonsPureRenderMixin2.default],

    render: function render() {
        return _react2.default.createElement(
            _svgIcon2.default,
            this.props,
            _react2.default.createElement('path', { d : "M5.3 6.7l1.4-1.4-3-3 1.3-1.3h-4v4l1.3-1.3z"}),
            _react2.default.createElement('path', { d : "M6.7 10.7l-1.4-1.4-3 3-1.3-1.3v4h4l-1.3-1.3z"}),
            _react2.default.createElement('path', { d : "M10.7 9.3l-1.4 1.4 3 3-1.3 1.3h4v-4l-1.3 1.3z"}),
            _react2.default.createElement('path', { d : "M11 1l1.3 1.3-3 3 1.4 1.4 3-3 1.3 1.3v-4z"})
        );
    }
});
exports.default = ContentExpand;
module.exports = exports['default'];