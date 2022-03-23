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
            mettre a jour ma bdd
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
            <Block flex row>
                <Block flex row = {false}>
                    <Block flex ></Block>
                    <Block center flex = {2} >
                        <Text h2>Login</Text>
                    </Block>
                    <Block left middle flex = {2} width="75%" style ={styles.millieu}>
                        <Text h3 >Nom</Text>
                        <Input onChangeText={(text) => this.setState({identifiant: text})}></Input>
                        <Text h3>Mot de Passe</Text>
                        <Input secureTextEntry={true} onChangeText={(text) => this.setState({mdp: text})}></Input>
                    </Block>
                    <Block flex></Block>
                    <Block bottom flex  left >
                        <Button bottom onPress={() => connect }>Connexion</Button>
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
  
