import { Router, Request, Response } from 'express';
import getModel from '../db/models';

const router = Router();

// renvoie un tableau avec tous les pubs
router.get('/', async (req: Request, res: Response): Promise<void> => {
    const barathonModel = getModel('barathon');

    // find sans paramètre renvoie l'ensemble des documents de la collection
    const barathons = await barathonModel.find();
    res.json(barathons);
});


router.get('/', async (req: Request, res: Response): Promise<void> => {
    const barathonModel = getModel('barathon');

    // find sans paramètre renvoie l'ensemble des documents de la collection
    const barathons = await barathonModel.find();
    res.json(barathons);
});

export default router;