# 🏫 AccesoEscuela – Sistema de Evaluación del Acceso Educativo

**AccesoEscuela** es una aplicación web desarrollada con **Laravel** y potenciada con un modelo predictivo de **Machine Learning en Python**, cuyo objetivo es detectar posibles casos de **exclusión educativa** a partir de datos socioeconómicos y de conectividad.

---

## 🎯 Objetivo

Ofrecer a instituciones escolares una herramienta inteligente que:
- Automatiza la recolección de datos de estudiantes
- Clasifica estudiantes en riesgo de exclusión
- Visualiza indicadores clave
- Genera reportes personalizables y exportables
- Incorpora un sistema de predicción con IA para apoyar decisiones

---

## 🚀 Tecnologías Utilizadas

### Backend
- Laravel 12.x
- PHP 8.2
- MySQL

### Frontend
- Blade (HTML/CSS/JS)
- Chart.js (gráficos)
- Estilos personalizados (Tailwind/Bootstrap opcional)

### API de IA
- Python 3.x
- Flask
- Scikit-learn + Joblib (modelo Random Forest)
- NumPy, Pandas

---

## 🔧 Instalación del Proyecto (Laravel)

1. Clona el repositorio:
```bash
git clone https://github.com/ElMau201003/AccesoEscuela.git
cd AccesoEscuela
```

2. Instala dependencias de Laravel:

```bash
composer install
npm install && npm run dev
```

3. Copia el archivo .env y configura tu base de datos:

```bash
cp .env.example .env
php artisan key:generate
```

4. Ejecuta migraciones y seeders:

```bash
php artisan migrate --seed
```

5. Inicia el servidor:

```bash
php artisan serve
```

## 🤖 Configuración del API de IA (Flask)

1. Ve a la carpeta /api o crea una nueva fuera del proyecto Laravel.

2. Crea y activa un entorno virtual:

```bash
python -m venv venv
venv\Scripts\activate  # En Windows
```

3. Instala las dependencias:

```bash
pip install flask joblib scikit-learn numpy pandas
```

4. Asegúrate de tener modelo_brechas.pkl generado con brechas_ml_api.py

5. Ejecuta el servidor Flask:

```bash
python api.py
```
Tu API estará corriendo en http://localhost:5000

### 📊 Funcionalidades Principales
- 📝 Registro de estudiantes con variables de riesgo
- 📊 Visualización de resultados con gráficos e indicadores
- 🧾 Generación de reportes por zona, nivel y fecha
- 📥 Exportación de reportes en PDF
- 🧠 Evaluación del riesgo con modelo predictivo (Flask API)


### 🧠 IA integrada: ¿Qué predice?
El sistema se conecta a un modelo de Machine Learning que, basado en:

- Zona geográfica
- Conectividad
- Condición de vulnerabilidad
- Indicadores socioeconómicos

…predice si un estudiante está en riesgo de brecha educativa, devolviendo:

- Clase_predicha (0 = sin brecha, 1 = con brecha)
- Probabilidad_brecha_baja (confianza en la predicción)

### 🧾 Créditos
Desarrollado por:

**Mauricio Gabriel Rivera Velazco** – Scrum Master

**Geraldine Gaury Iturrizaga Campean** – Scrum Team

**Yerson Yassir Medina Vertiz** – Scrum Team

Mag. Alfredo Guevara Jiménez - Docente guía

### 📄 Licencia
Este proyecto es de uso académico. Puedes adaptarlo y reutilizarlo con fines educativos o de investigación.

---
