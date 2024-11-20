import { Component } from '@angular/core';
import { CalendarModule } from 'primeng/calendar';

@Component({
  selector: 'app-license-details',
  standalone: true,
  imports: [CalendarModule],
  templateUrl: './license-details.component.html',
  styleUrl: './license-details.component.css'
})
export class LicenseDetailsComponent {

}
