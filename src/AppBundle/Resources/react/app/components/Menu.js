import React, { Component, PropTypes } from 'react';
import Drawer from 'material-ui/Drawer';
import MenuItem from 'material-ui/MenuItem';
import RaisedButton from 'material-ui/RaisedButton';
import MoreVertIcon from 'material-ui/svg-icons/navigation/more-vert';

class Menu extends Component {


    constructor(props) {
        super(props);
        this.state = {open: false};
    }

    handleToggle = () => this.setState({open: !this.state.open});

    render() {
        return (
            <div>
                <RaisedButton
                    label="Toggle Drawer"
                    onTouchTap={this.handleToggle}
                    icon={<MoreVertIcon />}
                />
                <Drawer open={this.state.open}>
                    <MenuItem>Menu Item</MenuItem>
                    <MenuItem>Menu Item 2</MenuItem>
                    <MenuItem>Menu Item 3</MenuItem>

                </Drawer>
            </div>
        );
    }
}
export default  Menu;