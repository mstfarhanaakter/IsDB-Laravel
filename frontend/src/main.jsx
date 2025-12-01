import { Component, StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import './index.css'
import App from './App.jsx'
import {  createBrowserRouter, RouterProvider } from 'react-router-dom'
import Home from './Components/Home.jsx'
import Login from './Components/Login.jsx'
import Register from './Components/Register.jsx'
import Master from './Components/Master.jsx'
import About from './Components/About.jsx'
import Dashboard from '../../../IsDB-React/react-firebase-auth-integration/src/components/Dashboard/Dashboard.jsx'

const router = createBrowserRouter([

  {
    path:"/",
    Component: Master,
    children: [{
      index:true, 
      Component: Home
    },
    {
      path:"/about",
      Component: About
    },
    {
      path:"/dashboard",
      Component: Dashboard,
    },
    {
      path:"/login",
      Component: Login
    },
    {
      path:"/register",
      Component: Register
    }
  ]
  }
  
  
])

createRoot(document.getElementById('root')).render(
  <StrictMode>

    <RouterProvider router={router} >
    
    </RouterProvider>
  </StrictMode>,
)
