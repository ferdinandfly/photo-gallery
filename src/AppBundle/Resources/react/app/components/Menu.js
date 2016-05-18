import React, { Component, PropTypes } from 'react';
import IconMenu from 'material-ui/IconMenu';
import MenuItem from 'material-ui/MenuItem';
import IconButton from 'material-ui/IconButton/IconButton';
import MoreVertIcon from 'material-ui/svg-icons/navigation/more-vert';

class Menu extends Component {

    constructor(props) {
        super(props);
        this.state = {value: 2};
    }

    handleChange = (event, index, value) => this.setState({value});

    render(){
        return(
            <div>
                <IconMenu
                    iconButtonElement={<IconButton><MoreVertIcon /></IconButton>}
                    anchorOrigin={{horizontal: 'left', vertical: 'top'}}
                    targetOrigin={{horizontal: 'left', vertical: 'top'}}
                >
                    <MenuItem primaryText="Refresh" />
                    <MenuItem primaryText="Send feedback" />
                    <MenuItem primaryText="Settings" />
                    <MenuItem primaryText="Help" />
                    <MenuItem primaryText="Sign out" />
                </IconMenu>
                <IconMenu
                    iconButtonElement={<IconButton><MoreVertIcon /></IconButton>}
                    anchorOrigin={{horizontal: 'left', vertical: 'bottom'}}
                    targetOrigin={{horizontal: 'left', vertical: 'bottom'}}
                >
                    <MenuItem primaryText="Refresh" />
                    <MenuItem primaryText="Send feedback" />
                    <MenuItem primaryText="Settings" />
                    <MenuItem primaryText="Help" />
                    <MenuItem primaryText="Sign out" />
                </IconMenu>
                <IconMenu
                    iconButtonElement={<IconButton><MoreVertIcon /></IconButton>}
                    anchorOrigin={{horizontal: 'right', vertical: 'bottom'}}
                    targetOrigin={{horizontal: 'right', vertical: 'bottom'}}
                >
                    <MenuItem primaryText="Refresh" />
                    <MenuItem primaryText="Send feedback" />
                    <MenuItem primaryText="Settings" />
                    <MenuItem primaryText="Help" />
                    <MenuItem primaryText="Sign out" />
                </IconMenu>
                <IconMenu
                    iconButtonElement={<IconButton><MoreVertIcon /></IconButton>}
                    anchorOrigin={{horizontal: 'right', vertical: 'top'}}
                    targetOrigin={{horizontal: 'right', vertical: 'top'}}
                >
                    <MenuItem primaryText="Refresh" />
                    <MenuItem primaryText="Send feedback" />
                    <MenuItem primaryText="Settings" />
                    <MenuItem primaryText="Help" />
                    <MenuItem primaryText="Sign out" />
                </IconMenu>
            </div>
        );
    }
}
export default  Menu;