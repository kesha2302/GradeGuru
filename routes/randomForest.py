import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestRegressor
from sklearn.metrics import mean_squared_error, r2_score
import matplotlib.pyplot as plt
import numpy as np
import seaborn as sns
import plotly.express as px

# Step 1: Load the CSV
uk = pd.read_csv("student_habits_performance.csv")

#  Step 2: Define Features and Target
# Drop non-relevant columns
uk = uk.drop(columns=['student_id'])
# Define the most relevant features based on your selection
features = ['study_hours_per_day', 'sleep_hours', 'social_media_hours','mental_health_rating']
target = 'exam_score'


X = uk[features]
y = uk[target]

#  Split the data
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Train Random Forest
model = RandomForestRegressor(n_estimators=100, random_state=42)
model.fit(X_train, y_train)

#  Predictions
y_pred = model.predict(X_test)

# Evaluation
mse = mean_squared_error(y_test, y_pred)
r2 = r2_score(y_test, y_pred)

print(f" Random Forest Results")
print(f"Mean Squared Error: {mse:.2f}")
print(f"R-squared Score: {r2:.4f}")

print("Mean Squared Error:", mean_squared_error(y_test, y_pred))
print("R-squared Score:", r2_score(y_test, y_pred))

 # Compare some values
# results = pd.DataFrame({'Actual': y_test, 'Predicted': y_pred})
results = pd.DataFrame({
    'Actual': y_test.values,
    'Predicted': y_pred
})
print(results.head())




# Actual vs Predicted Plot
# plt.figure(figsize=(8, 6))
# plt.scatter(results['Actual'], results['Predicted'], color='blue', alpha=0.6)
# plt.plot([results['Actual'].min(), results['Actual'].max()], [results['Actual'].min(), results['Actual'].max()], 'r--')  # Diagonal line
# plt.title('Actual vs. Predicted Living Cost Index')
# plt.xlabel('Actual')
# plt.ylabel('Predicted')
# plt.grid(True)
# plt.show()



# results = pd.DataFrame({
#     'Actual Living_Cost_Index': y_test,
#     'Predicted Living_Cost_Index': y_pred
# })

# # Step 2: Create interactive scatter plot
# fig = px.scatter(
#     results,
#     x='Actual Living_Cost_Index',
#     y='Predicted Living_Cost_Index',
#     title='📊 Actual vs Predicted Living_Cost_Index (Random Forest)',
#     opacity=0.6,
#     width=700,
#     height=500,
#     labels={
#         'Actual Living_Cost_Index': 'Actual Living Cost Index',
#         'Predicted Living_Cost_Index': 'Predicted Living Cost Index'
#     },
#     template='plotly_white'
# )

# # Step 3: Add perfect prediction reference line (y = x)
# min_val = min(results.min())
# max_val = max(results.max())

# fig.add_shape(
#     type='line',
#     x0=min_val, y0=min_val,
#     x1=max_val, y1=max_val,
#     line=dict(color='red', dash='dash', width=2),
# )

# # Step 4: Set same range for X and Y axes for accurate comparison
# fig.update_layout(
#     xaxis=dict(range=[min_val, max_val]),
#     yaxis=dict(range=[min_val, max_val])
# )

# # Step 5: Show the plot
# fig.show()



