import React from 'react';
import { View, StyleSheet, Text, Button, TextInput } from 'react-native';

export default function PageLogin() {
    return (
    <View style={styles.container}>
        <Text>Login</Text>
        <Text>Nom</Text>
        <TextInput></TextInput>
        <Text>Prenom</Text>
        <TextInput></TextInput>
        <Button title='Connexion'></Button>
    </View>
  );
}

const styles = StyleSheet.create({
    container:{
        flex:1
    }
})