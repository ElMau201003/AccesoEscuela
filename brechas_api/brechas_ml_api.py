# Importar librerías
import numpy as np
import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestClassifier
from sklearn.metrics import (
    accuracy_score, precision_score, recall_score,
    f1_score, classification_report, confusion_matrix, roc_auc_score
)
import joblib

# Generar datos simulados
np.random.seed(42)
data = pd.DataFrame({
    'Zona': np.random.choice(['Rural', 'Urbana'], 200),
    'Conectividad': np.random.choice(['Buena', 'Regular', 'Mala'], 200),
    'Condicion_Vulnerabilidad': np.random.randint(1, 11, 200),
    'Indicadores': np.random.uniform(0, 1, 200),
    'Clase': np.random.choice([0, 1], 200)
})

# Codificar variables categóricas
data['Zona'] = data['Zona'].map({'Rural': 0, 'Urbana': 1})
data['Conectividad'] = data['Conectividad'].map({'Mala': 0, 'Regular': 1, 'Buena': 2})

# Separar variables predictoras y etiqueta
X = data[['Zona', 'Conectividad', 'Condicion_Vulnerabilidad', 'Indicadores']]
y = data['Clase']

# División Train/Test
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Modelo Random Forest
model = RandomForestClassifier(n_estimators=200, random_state=42)
model.fit(X_train, y_train)

# Evaluación
y_pred = model.predict(X_test)
y_proba = model.predict_proba(X_test)[:, 1]

print("===== MÉTRICAS DEL MODELO =====")
print(f"Accuracy: {accuracy_score(y_test, y_pred):.2f}")
print(f"Precision: {precision_score(y_test, y_pred):.2f}")
print(f"Recall: {recall_score(y_test, y_pred):.2f}")
print(f"F1 Score: {f1_score(y_test, y_pred):.2f}")
print(f"ROC-AUC: {roc_auc_score(y_test, y_proba):.2f}")
print("\n=== Reporte de Clasificación ===")
print(classification_report(y_test, y_pred))
print("=== Matriz de Confusión ===")
print(confusion_matrix(y_test, y_pred))

# Guardar el modelo
joblib.dump(model, 'modelo_brechas.pkl')
