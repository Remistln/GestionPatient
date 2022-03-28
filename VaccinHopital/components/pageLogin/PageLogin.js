import { Text, Block, Button, Input } from 'galio-framework';
import { StyleSheet } from 'react-native';
import { Component } from 'react';

export default class PageLogin extends Component {

    constructor()
    {
        super();
        this.state = {
            identifiant: '',
            mdp: ''
        }
    }

    connect()
    {
        /*
            Plan:
            mettre a jour ma bdd CHECK
            mettre a jour fakker pour hasher les mdps CHECK
            coder un appel API pour obtenir le secretaire
                appel sync
                si possible en fonction de l'identifiant
            verifier le mdp
            passer à la page Acceuil si mdp correct
                attention debut d'architecture d'app nécessaire
        */
        compare(string, hash, function(err, res)
        {
            if (res)
            {

            };
        }
        );
    };

    render(){
        return (
            <Block  style = {styles.block}>
                <Block flex row = {false}>

                    <Block  style = {styles.titre} >
                        <Text  style = {styles.TextTitre} h2>Login</Text>
                    </Block>
                    <Block  style = {styles.nom}>
                        <Text h4>Nom : </Text>
                        <Input ></Input>
                    </Block>

                    <Block  style = {styles.mdp}>
                        <Text h4>Mot de Passe : </Text>
                        <Input  secureTextEntry={true}></Input>
                    </Block>

                    <Block  style = {styles.connexion} >
                        <Button bottom>Connexion</Button>
                    </Block>
                </Block>
            </Block>
        );
    }
  
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
  
