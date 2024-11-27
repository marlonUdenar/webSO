import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { CommonModule } from '@angular/common';
import { HttpClient } from '@angular/common/http';
import { ReactiveFormsModule } from '@angular/forms';
import { FormularioService } from '../../services/formulario.service';
import { CalendarModule } from 'primeng/calendar';

@Component({
  selector: 'app-formulario',
  standalone: true,
  imports: [ReactiveFormsModule, CommonModule,CalendarModule],
  templateUrl: './formulario.component.html',
  styleUrls: ['./formulario.component.css']
})
export class FormularioComponent {
  formularioForm: FormGroup;

  constructor(
    private fb: FormBuilder, 
    private router: Router,
    private http: HttpClient,
    private registerService: FormularioService
  ) {
    this.formularioForm = this.fb.group({
      firstName: ['', Validators.required],
      lastName: ['', Validators.required],
      email: ['', [Validators.required, Validators.email]],
      phone: ['', Validators.required],
      managerName: ['', Validators.required],
      managerEmail: ['', [Validators.required, Validators.email]],
      startDate: ['', Validators.required],
      endDate: ['', Validators.required],
      notes: ['']
    });
  }

  // Enviar formulario
  onSubmit() {
    if (this.formularioForm.valid) {
      const formData = this.formularioForm.value;
      const solicitud = {
        PrimerNombre: formData.firstName,
        Apellido: formData.lastName,
        Correo: formData.email,
        Telefono: formData.phone,
        NombreGerente: formData.managerName,
        CorreoGerente: formData.managerEmail,
        FechaInicio: new Date(formData.startDate).toISOString(),
        FechaFin: new Date(formData.endDate).toISOString(),
        Notas: formData.notes
      };

      this.registerService.submitVacationRequest(solicitud).subscribe(response => {
        console.log('Formulario enviado correctamente', response);
      }, error => {
        console.error('Error al enviar el formulario:', error);
      });

      console.log('Formulario Enviado', solicitud);
    } else {
      this.formularioForm.markAllAsTouched(); 
    }
  }
}
