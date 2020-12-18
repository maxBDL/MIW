// src/routes/index.ts

// ce fichier vient associer tous nos routes aux urls de base qui
// leur sont associés
import { Application } from 'express';
import pubs from './pubs';
import barathons from './barathons';
export default (app: Application): void => {
    app.use('/pubs', pubs);
    app.use('/barathons', barathons);
};