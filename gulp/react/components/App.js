import React, { Component, PropTypes } from 'react';
import Drawer from 'material-ui/Drawer';
import MenuItem from 'material-ui/MenuItem';
import RaisedButton from 'material-ui/RaisedButton';
import MoreVertIcon from 'material-ui/svg-icons/navigation/more-vert';
import { getCategories } from '../helpers/functions';
import Slider from './Slider';
class AppComponent extends Component
{
    componentWillMount(){
        getCategories(this.props.dispatch);
    }

    constructor(props) {
        super(props);
        this.state = {open: false};
    }

    handleOpenMenu = () => this.setState({open: true});
    handleCloseMenu = () => this.setState({open: false});
    render()
    {
        return (
            <div className="row">
                <Drawer open={this.state.open}>
                    <MenuItem>Menu Item</MenuItem>
                    <MenuItem>Menu Item 2</MenuItem>
                    <MenuItem>Menu Item 3</MenuItem>

                </Drawer>
                <div className="main-slider col-xs12"
                     onMouseLeave={this.handleOpenMenu()}
                     onMouseEnter={this.handleCloseMenu()}
                >
                    {this.props.children}
                </div>
            </div>
        );
    }
}
const mapState = (state) => {
    return {
        categories: state.main.categories
    }
};
const App = connect(mapState)(AppComponent);
export default App;



export default  App;