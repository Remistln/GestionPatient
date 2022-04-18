import {Block, Button, Icon } from 'galio-framework';
import { StyleSheet } from "react-native";
import React, { useState } from 'react';

export default function AgendaMois() {

    return(
        <Block style = {styles.block}>
            <Block style = {styles.entete}>

            </Block>
            <Block style = {styles.agenda}>

            </Block>
        </Block>
    );
};


const styles = StyleSheet.create({

    block :
    {
        flexDirection: "column",
        flex: 1,
        justifyContent: 'flex-start',
            
        borderColor: "black",
        borderWidth: 5,
        padding:15,
    },

    agenda: 
    {
        flex: 4,
    },
    
    entete: 
    {
        flex: 1,
        flexDirection: "row",
        justifyContent: "center",
        alignItems:"center",
        borderColor: "black",
        borderWidth: 4,

    },
    
    jours :
    {
        flex: 1,
        justifyContent: 'space-evenly',
        flexDirection: 'row',
        alignItems:"center",
    },
    
    jour :
    {
        width: 45,
        height: 45,
    },

});