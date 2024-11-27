// vacation-request.service.ts
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class FormularioService {
  private apiUrl = 'https://localhost:7107/api/Formulario/Register';  // URL del backend

  constructor(private http: HttpClient) {}

  // Método para enviar los datos del formulario al backend
  submitVacationRequest(requestData: any): Observable<any> {
    return this.http.post<any>(this.apiUrl, requestData);
  }
}
