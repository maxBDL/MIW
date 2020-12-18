// src/index.ts
import express from 'express';
import dotenv from 'dotenv';
import initDatabase from './db/index';
import routes from './routes';

// fonction passe-plat pour s'assurer de l'ordre d'execution de nos appels asynchrone
const startServer = async (): Promise<void> => {
    // permet d'utiliser les variables d'environnement du .env
    dotenv.config();
    // création de l'application express
    const app = express();

    // initialisation de la connection à la BDD
    await initDatabase();

    // montage des endpoints
    routes(app);

    // écoute sur le port définie en environnement
    app.listen(process.env.PORT, () => {
        console.log(`Server listening on port ${process.env.PORT}`);
    });
};

startServer();
