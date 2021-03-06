import { Text, Block, Button, Input } from 'galio-framework';
import { StyleSheet } from 'react-native';
import { Component } from 'react';
import * as bcrypt from 'bcryptjs';
import { useNavigation, NavigationContainer } from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';

export default class PageLogin extends Component {

    constructor({navigation})
    {
        super({navigation});
        this.state = {
            identifiant: '',
            mdp: '',
        }
    };

    async connect({navigation})
    {
        /*
            Plan:
            mettre a jour ma bdd CHECK
            mettre a jour fakker pour hasher les mdps CHECK
            coder un appel API pour obtenir le secretaire CHECK
            verifier le mdp CHECK
            passer à la page Acceuil si mdp correct
                attention debut d'architecture d'app nécessaire
        */

        // écrire une fonction qui ignore la casse de l'e-mail

        var ApiHeaders = new Headers({
            'Content-Type': 'application/ld+json'
        });

        // ip de l'ordinateur où se trouve le serveur
        const ip ="172.20.10.4:8000";

        const url = 'http://' + ip + '/api/secretaires';
        await fetch(url, { method: 'GET', headers: ApiHeaders,}) 
            .then(response => response.json())
            .then((data) => {
                for (const secretaire of data['hydra:member'])
                {
                    if (secretaire.identifiant != this.state.identifiant)
                    {
                        continue;
                    }

                    if( bcrypt.compareSync(this.state.mdp, secretaire.mdp) )
                    {
                        console.log("bon mdp");
                        this.props.navigation.navigate('PageAcceuil');
                    }
                }
            })
            .catch(function(error) {
                console.log('There has been a problem with your fetch operation: ' + error.message);
                 // ADD THIS THROW error
                  throw error;
                });
    };



    render(){
        return (
            <Block  style = {styles.block}>
                <Block flex row = {false}>

                    <Block  style = {styles.titre} >
                        <Text  style = {styles.TextTitre} h2>Login</Text>
                    </Block>
                    <Block  style = {styles.nom}>
                        <Text h4>Email : </Text>
                        <Input onChangeText=
                        {
                            (text) => 
                            {
                                this.setState(
                                {
                                    identifiant: text
                                });
                            }
                        }
                            
                        ></Input>
                    </Block>

                    <Block  style = {styles.mdp}>
                        <Text h4>Mot de Passe : </Text>
                        <Input  onChangeText=
                        {
                            (text) => 
                            {
                                this.setState(
                                {
                                    mdp: text
                                });
                            }
                        }
                            secureTextEntry={true}></Input>
                    </Block>

                    <Block  style = {styles.connexion} >
                        <Button bottom onPress={this.connect.bind(this)}>Connexion</Button>
                    </Block>
                </Block>
            </Block>
        );
    };
  
}

const styles = StyleSheet.create({

    block :
        {
            flexDirection: "column",
            flex: 5,
            padding : 50
        },
    titre: {
        justifyContent: 'space-evenly',
        flex: 2,
        textAlign: "center",
        fontWeight : 'bold',
    },
    TextTitre : {
        fontWeight: "bold",
        textAlign: "center",
    },
    nom: {
        flex: 2,
        justifyContent: 'space-evenly',

    },
    mdp: {
        flex: 2,
        justifyContent: 'space-evenly',
    },
    connexion : {
        flex : 2,
        marginBottom : 10,
        justifyContent: 'space-evenly',
        alignItems:'center',
    }
  });
  
