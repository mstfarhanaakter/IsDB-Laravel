import React from "react";
import axios from "axios";
import { useState } from "react";
import { Link,useNavigate  } from "react-router-dom";
const Register = () => {
    const navigate = useNavigate();
  const [form, setForm] = useState({ name: "", email: "", password: "" });

  const handleChange = (e) => {
    setForm({ ...form, [e.target.name]: e.target.value });
  };

  const submit = async (e) => {
    e.preventDefault();
    const res = await axios.post("http://127.0.0.1:8000/api/register", form);
    localStorage.setItem("token", res.data.token);
    alert("Registration Success!");
       navigate("/login");
  };

  return (
    <div className="container">
  <div className="row justify-content-center pt-5">
    <div className="col-sm-6 col-md-5 col-lg-4">

      <div className="card p-4 shadow-lg border-0" style={{ borderRadius: "16px" }}>
        <h2 className="text-center mb-4 fw-bold text-primary">Create Account</h2>

        <form onSubmit={submit}>
          
          <div className="form-group mb-3">
            <label className="fw-semibold">Full Name</label>
            <input
              name="name"
              className="form-control p-2 rounded-3"
              placeholder="Enter your name"
              onChange={handleChange}
            />
          </div>

          <div className="form-group mb-3">
            <label className="fw-semibold">Email Address</label>
            <input
              name="email"
              className="form-control p-2 rounded-3"
              placeholder="Enter your email"
              onChange={handleChange}
            />
          </div>

          <div className="form-group mb-3">
            <label className="fw-semibold">Password</label>
            <input
              name="password"
              type="password"
              className="form-control p-2 rounded-3"
              placeholder="Enter your password"
              onChange={handleChange}
            />
          </div>

          <button
            className="btn btn-primary w-100 py-2 fw-bold rounded-3 mt-2"
          >
            Register
          </button>
        </form>

        <p className="text-center mt-3 mb-0">
          Already have an account?{" "}
          <Link to="/login" className="fw-semibold text-primary">
            Log in
          </Link>
        </p>
      </div>

    </div>
  </div>
</div>

  );
};

export default Register;