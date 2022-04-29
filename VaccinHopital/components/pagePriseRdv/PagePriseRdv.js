import { Text, Block, Button, Input } from 'galio-framework';
import { StyleSheet } from 'react-native';
import { Component } from 'react';

export default class PagePriseRdv extends Component 
{
    constructor({navigation})
    {
        super({navigation});
        this.state = {
            jour: 1,
            mois: "janvier",
            annee: 0,
        }
    };

    render()
    {
    return(
        <Block> 
            <Block>
                <Block>
                    <Text>Date :</Text>
                </Block>
                <Block>
                    <Text>{this.state.jour} / {this.state.mois} / {this.state.annee}</Text>
                </Block>
            </Block>

            <Block>
                <Block>
                    <Text>Nom :</Text>
                </Block>
                <Block>
                    <Input></Input>
                </Block>
            </Block>

            <Block>
                <Block>
                    <Text>Prénom :</Text>
                </Block>
                <Block>
                    <Input></Input>
                </Block>
            </Block>

            <Block>
                <Block>
                    <Text>Date de Naissance :</Text>
                </Block>
                <Block>
                    <Input></Input>
                </Block>
            </Block>

            <Block>
                <Block>
                    <Text>Heure de Passage :</Text>
                </Block>
                <Block>
                
                </Block>
            </Block>

            <Block>
                <Block>
                    <Text>Vaccins :</Text>
                </Block>
                <Block>
                
                </Block>
            </Block>
        </Block>
    )
        
    };
};