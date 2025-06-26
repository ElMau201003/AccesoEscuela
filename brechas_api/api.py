from flask import Flask, request, jsonify
import joblib
import numpy as np

# Cargar modelo
model = joblib.load('modelo_brechas.pkl')

# Crear app Flask
app = Flask(__name__)

@app.route('/')
def home():
    return "API de predicción de brechas educativas"

@app.route('/predict', methods=['POST'])
def predict():
    data = request.get_json()
    
    try:
        zona = 0 if data['Zona'] == 'Rural' else 1
        conectividad = {'Mala': 0, 'Regular': 1, 'Buena': 2}[data['Conectividad']]
        condicion = float(data['Condicion_Vulnerabilidad'])
        indicadores = float(data['Indicadores'])

        input_data = np.array([[zona, conectividad, condicion, indicadores]])
        prediction = model.predict(input_data)[0]
        probability = model.predict_proba(input_data)[0][1]

        return jsonify({
            "Clase_predicha": int(prediction),
            "Probabilidad_brecha_baja": round(probability, 2)
        })
    
    except Exception as e:
        return jsonify({"error": str(e)})

if __name__ == '__main__':
    app.run(debug=True)
