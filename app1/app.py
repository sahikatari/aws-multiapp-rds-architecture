from flask import Flask, render_template, request, redirect
import pymysql

app = Flask(__name__)

# RDS Database Connection
db = pymysql.connect(
    host="multiple-apps-db.cfsiea4gms2x.eu-west-1.rds.amazonaws.com",
    user="admin",
    password="admin1234",
    database="studentdb"
)

@app.route('/', methods=['GET', 'POST'])
def index():

    if request.method == 'POST':

        name = request.form['name']
        email = request.form['email']

        cursor = db.cursor()

        sql = "INSERT INTO students(name, email) VALUES(%s, %s)"
        cursor.execute(sql, (name, email))

        db.commit()

        return redirect('/')

    cursor = db.cursor()
    cursor.execute("SELECT * FROM students ORDER BY id DESC")

    students = cursor.fetchall()

    return render_template('index.html', students=students)


if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)
