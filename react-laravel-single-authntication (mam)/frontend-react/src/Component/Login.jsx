import React from 'react'
import { useState } from "react";
import axios from "axios";
import { Link,useNavigate  } from "react-router-dom";
const Login = () => {
  const navigate = useNavigate();
  const [form, setForm] = useState({ email:"", password:"" });

  const change = (e) =>
    setForm({ ...form, [e.target.name]: e.target.value });

  const submitForm = async (e) => {
    e.preventDefault();
    const res = await axios.post("http://127.0.0.1:8000/api/login", form);

    localStorage.setItem("token", res.data.token);
    alert("Logged in!");
      navigate("/home");
  };

  return (
   <div className="container">
  <div className="row justify-content-center pt-5">
    <div className="col-sm-6 col-md-5 col-lg-4">

      <div className="card p-4 shadow-lg border-0" style={{ borderRadius: "16px" }}>
        <h2 className="text-center mb-4 fw-bold text-primary">Login</h2>

        <div className="form-group mb-3">
          <label className="fw-semibold">Email Address</label>
          <input
            type="email"
            className="form-control p-2 rounded-3"
            placeholder="Enter your email"
            name="email"
            onChange={change}
          />
        </div>

        <div className="form-group mb-3">
          <label className="fw-semibold">Password</label>
          <input
            type="password"
            className="form-control p-2 rounded-3"
            placeholder="Enter your password"
            name="password"
            onChange={change}
          />
        </div>

        <button
          type="button"
          onClick={submitForm}
          className="btn btn-primary w-100 py-2 fw-bold mt-2 rounded-3"
        >
          Login
        </button>

        <p className="text-center mt-3 mb-0">
          <span className="text-muted">Don’t have an account?</span>{" "}
          <Link to="/" className="fw-semibold text-primary">
            Sign Up
          </Link>
        </p>
      </div>
    </div>
  </div>
</div>

  )
}

export default Login