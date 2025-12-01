import { Route, Routes } from "react-router-dom";
import Navbar from "./Components/Navbar";
import Home from "./Components/Home";

const App = () => {
  return <>
 
  <Routes>
    <Route path="/" element={<Master></Master>}/>
  </Routes>
  </>
}

export default App;