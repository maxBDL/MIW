// src/types/database.ts
import { Schema } from 'mongoose';

export interface ICustomSchema {
    collection: string,
    definition: Schema
}

