import React, { Component, useState } from 'react';
import { View, StyleSheet, TextInput } from 'react-native';
import DatePicker from 'react-native-datepicker';
import moment from 'moment';

export default class MyDatePicker extends Component {
    constructor(props) {
        super(props);
        this.state = { date: null, dt: null, registrationDate: '' };
    }
    checkValue(str, max) {
        if (str.charAt(0) !== '0' || str === '00') {
            var num = parseInt(str);
            if (isNaN(num) || num <= 0 || num > max) num = 1;
            str =
                num > parseInt(max.toString().charAt(0)) && num.toString().length === 1
                    ? '0' + num
                    : num.toString();
        }
        return str;
    }
    dateTimeInputChangeHandler = (e) => {
        this.type = 'text';
        var input = e;
        var expr = new RegExp(/\D\/$/);
        if (expr.test(input)) input = input.substr(0, input.length - 3);
        var values = input.split('/').map(function (v) {
            return v.replace(/\D/g, '');
        });
        if (values[1]) values[1] = this.checkValue(values[1], 12);
        if (values[0]) values[0] = this.checkValue(values[0], 31);
        var output = values.map(function (v, i) {
            return v.length === 2 && i < 2 ? v + '/' : v;
        });
        this.setState({
            registrationDate: output.join('').substr(0, 14),
        });
    };
    render() {
        return (
            <View style={styles.container}>
                <DatePicker
                    onChangeRaw={(e) => e.preventDefault()}
                    showIcon={false}
                    androidMode="spinner"
                    style={{ width: 300 }}
                    date={this.state.date}
                    mode="date"
                    placeholder="DD/MM/YYYY"
                    format="DD-MM-YYYY"
                    minDate={'01-01-1900'}
                    maxDate={moment().format('DD-MM-YYYY')}
                    confirmBtnText="Confirmer"
                    cancelBtnText="Annuler"
                    customStyles={{
                        dateInput: {
                            backgroundColor: 'white',
                            borderWidth: 1,
                            borderColor: 'black',
                        },
                    }}
                    onDateChange={(date) => {
                        this.setState({ date: date });
                    }}
                />


            </View>
        );
    }
}
const styles = StyleSheet.create({
    container: {
        flex: 1,
        alignItems: 'center',
        justifyContent: 'center',
        marginTop: 20,
        padding: 16,
        height : 20
    },
});