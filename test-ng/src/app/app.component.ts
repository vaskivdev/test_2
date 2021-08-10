import { Component } from '@angular/core';
import { ExportData, Locales, ExportService } from './app.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
    title = 'test-ng';
    exports: ExportData[];
    locales: Locales[];
    errorMessage: string;
    selectedLocale: string

    constructor(private exportService: ExportService) {
        this.exports = [];
        this.locales = [];
        this.errorMessage = '';
        this.selectedLocale = '';
        this.getExports();
        this.getLocales();
    }

    getExports() {
        this.exportService
            .getExports(this.selectedLocale)
            .subscribe(
                exports => this.exports = exports,
                error => this.errorMessage = <any>error
            );
    }

    getLocales() {
        this.exportService
            .getLocales()
            .subscribe(
                locales => this.locales = locales,
                error => this.errorMessage = <any>error
            );
    }

    submitFilters() {
    console.log(this.selectedLocale);
        this.getExports();
    }
}
