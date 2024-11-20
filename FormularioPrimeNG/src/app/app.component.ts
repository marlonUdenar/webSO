import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterOutlet } from '@angular/router';
import { NgModule } from '@angular/core';
import { PersonalInfoComponent } from './components/personal-info/personal-info.component';
import { ManagerInfoComponent } from './components/manager-info/manager-info.component';
import { LicenseDetailsComponent } from './components/license-details/license-details.component';
import { FormsModule } from '@angular/forms';
import { InputTextModule } from 'primeng/inputtext';
import { ButtonModule } from 'primeng/button';
import { CalendarModule } from 'primeng/calendar';
import { InputTextareaModule } from 'primeng/inputtextarea';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [
    RouterOutlet,
    CommonModule,
    FormsModule,
    InputTextModule,
    ButtonModule,
    CalendarModule,
    InputTextareaModule,
    PersonalInfoComponent,
    ManagerInfoComponent,
    LicenseDetailsComponent],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css'
})
export class AppComponent {
  title = 'FormularioPrimeNG';
  
}
