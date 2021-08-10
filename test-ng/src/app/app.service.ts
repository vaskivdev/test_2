import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

export interface ExportData {
    id: Number,
    name: String,
    date: String,
    hour: String,
    username: String,
    localname: String
}

export interface Locales {
    name: String
}

const API_URL: string = 'http://127.0.0.1:8000';

@Injectable()
export class ExportService {
    
    constructor(private http: HttpClient) { }

    getExports(selectedLocale: any) {
        return this.http.post<ExportData[]>(API_URL + '/exports', {
            selectedLocale: selectedLocale.name
        });
    }

    getLocales() {
        return this.http.get<Locales[]>(API_URL + '/exports/locales');
    }
}