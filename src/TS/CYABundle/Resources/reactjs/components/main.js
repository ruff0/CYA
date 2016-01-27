/** In this file, we create a React component which incorporates components provided by material-ui */

import React from 'react';
import RaisedButton from 'material-ui/lib/raised-button';
import ThemeManager from 'material-ui/lib/styles/theme-manager';
import LightRawTheme from 'material-ui/lib/styles/raw-themes/light-raw-theme';
import Colors from 'material-ui/lib/styles/colors';
import FlatButton from 'material-ui/lib/flat-button';

import Card from 'material-ui/lib/card/card';
import CardActions from 'material-ui/lib/card/card-actions';
import CardHeader from 'material-ui/lib/card/card-header';
import CardMedia from 'material-ui/lib/card/card-media';
import CardTitle from 'material-ui/lib/card/card-title';
import CardText from 'material-ui/lib/card/card-text';
import Formulario from './formulario';

const containerStyle = {
    textAlign: 'center',
    paddingTop: 200
};

const Main = React.createClass({
    childContextTypes: {
        muiTheme: React.PropTypes.object
    },

    getInitialState() {
        return {
            muiTheme: ThemeManager.getMuiTheme(LightRawTheme),
            open: false,
        };
    },

    getChildContext() {
        return {
            muiTheme: this.state.muiTheme
        };
    },

    componentWillMount() {
        let newMuiTheme = ThemeManager.modifyRawThemePalette(this.state.muiTheme, {
            accent1Color: Colors.teal500
        });

        this.setState({muiTheme: newMuiTheme});
    },

    _handleRequestClose() {
        this.setState({
            open: false
        });
    },

    _handleTouchTap() {
        this.setState({
            open: true
        });
    },
    render() {
        const standardActions = (
            <FlatButton
                label="Okey"
                secondary={true}
                onTouchTap={this._handleRequestClose}
            />
        );
        return (
            <div style={containerStyle}>
                <Card>
                    <CardTitle title="Title" subtitle="Subtitle"/>
                    <CardActions>
                    <Formulario />
                    </CardActions>
                    <CardText>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Donec mattis pretium massa. Aliquam erat volutpat. Nulla facilisi.
                        Donec vulputate interdum sollicitudin. Nunc lacinia auctor quam sed pellentesque.
                        Aliquam dui mauris, mattis quis lacus id, pellentesque lobortis odio.
                    </CardText>
                </Card>
            </div>
        );
    }
});

export default Main;