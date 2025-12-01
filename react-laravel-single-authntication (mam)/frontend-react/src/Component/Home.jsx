import React from "react";
import 'bootstrap/dist/css/bootstrap.min.css';
import { Link, useNavigate } from "react-router-dom";

export default function Home() {
  const navigate = useNavigate();

  const handleLogout = () => {
    localStorage.removeItem("token"); // remove token
    navigate("/login"); // redirect to login/register
  };
  return (
    <div>
      {/* Navbar */}
     {/* Navbar */}
      <nav className="navbar navbar-expand-lg navbar-dark bg-info sticky-top shadow-sm">
        <div className="container">
          <a className="navbar-brand fw-bold" href="#">TravelExplorer</a>
          <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span className="navbar-toggler-icon"></span>
          </button>
          <div className="collapse navbar-collapse" id="navbarNav">
            <ul className="navbar-nav ms-auto mb-2 mb-lg-0">
              <li className="nav-item"><a className="nav-link active" href="#">Home</a></li>
              <li className="nav-item"><a className="nav-link" href="#">Destinations</a></li>
              <li className="nav-item"><a className="nav-link" href="#">Packages</a></li>
              <li className="nav-item"><a className="nav-link" href="#">Contact</a></li>

              {/* Fixed Logout button */}
              <li className="nav-item">
                <button 
                  className="btn btn-danger nav-link text-white" 
                  style={{marginLeft: "5px", cursor: "pointer"}} 
                  onClick={handleLogout}
                >
                  Logout
                </button>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      {/* Hero Section */}
      <header className="bg-light py-5 d-flex align-items-center" style={{backgroundImage: "url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1350&q=80')", backgroundSize: "cover", backgroundPosition: "center"}}>
        <div className="container text-center text-white" style={{textShadow: "2px 2px 4px rgba(0,0,0,0.7)"}}>
          <h1 className="display-4 fw-bold">Explore The World With Us</h1>
          <p className="lead mt-3">
            Find the best destinations, affordable packages, and unforgettable travel experiences.
          </p>
          <button className="btn btn-warning btn-lg mt-3 fw-bold">Book Now</button>
        </div>
      </header>

      {/* Popular Destinations */}
      <section className="py-5">
        <div className="container">
          <h2 className="text-center fw-bold mb-4 text-info">Popular Destinations</h2>
          <div className="row g-4">
            {[ 
              {title: "Maldives", img: "https://images.unsplash.com/photo-1502602898657-3e91760cbb34"},
              {title: "Bali", img: "https://images.unsplash.com/photo-1500530855697-b586d89ba3ee"},
              {title: "Switzerland", img: "https://images.unsplash.com/photo-1528909514045-2fa4ac7a08ba"}
            ].map((place, i) => (
              <div className="col-md-4" key={i}>
                <div className="card shadow-sm h-100 border-0">
                  <img src={place.img} className="card-img-top" alt={place.title} />
                  <div className="card-body text-center">
                    <h5 className="card-title fw-bold text-info">{place.title}</h5>
                    <p className="card-text text-muted">A breathtaking destination you must visit.</p>
                    <button className="btn btn-outline-info btn-sm">View More</button>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Travel Packages */}
      <section className="py-5 bg-light">
        <div className="container">
          <h2 className="text-center fw-bold mb-4 text-info">Special Packages</h2>
          <div className="row g-4">
            {[ 
              {title: "Honeymoon Package", price: "$999"},
              {title: "Family Tour", price: "$799"},
              {title: "Adventure Trip", price: "$699"}
            ].map((pkg, i) => (
              <div className="col-md-4" key={i}>
                <div className="card shadow-sm h-100 border-0 p-3 text-center">
                  <h4 className="fw-bold text-info">{pkg.title}</h4>
                  <p className="text-muted mt-2">Starting from</p>
                  <h3 className="fw-bold text-dark">{pkg.price}</h3>
                  <button className="btn btn-info text-white fw-bold mt-3">Book Package</button>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Footer */}
      <footer className="bg-info text-white text-center py-3">
        © {new Date().getFullYear()} TravelExplorer — Explore. Dream. Discover.
      </footer>
    </div>
  );
}