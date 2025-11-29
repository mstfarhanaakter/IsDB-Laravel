import Navbar from './Navbar'; // আগের navbar import
import { FaLeaf, FaSeedling, FaGift } from 'react-icons/fa';

const FlowerHome = () => {
  return (
    <div className="min-h-screen bg-gray-50">
      {/* Navbar */}
      <Navbar />

      {/* Hero Section */}
      <section className="bg-gradient-to-r from-pink-300 via-purple-300 to-yellow-200 py-32 px-6 md:px-20 text-center md:text-left rounded-b-3xl shadow-lg">
        <h1 className="text-5xl font-bold mb-4 text-white drop-shadow-lg">Bloom with Happiness</h1>
        <p className="text-xl mb-8 text-white drop-shadow-md">Fresh flowers delivered to your doorstep. Brighten your day with nature's beauty.</p>
        <a 
          href="/shop" 
          className="bg-white text-pink-500 font-semibold px-6 py-3 rounded-full shadow-lg hover:bg-gray-100 transition duration-300"
        >
          Shop Now
        </a>
      </section>

      {/* Featured Flowers */}
      <section className="py-20 px-6 md:px-20">
        <h2 className="text-3xl font-bold text-center mb-12 text-pink-600">Our Top Flowers</h2>
        <div className="grid md:grid-cols-3 gap-8">
          <div className="bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transition duration-300 text-center">
            <img src="https://source.unsplash.com/200x200/?rose" alt="Rose" className="mx-auto rounded-lg mb-4"/>
            <h3 className="font-bold text-xl mb-2 text-pink-500">Roses</h3>
            <p>Classic symbol of love and beauty.</p>
          </div>
          <div className="bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transition duration-300 text-center">
            <img src="https://source.unsplash.com/200x200/?tulip" alt="Tulip" className="mx-auto rounded-lg mb-4"/>
            <h3 className="font-bold text-xl mb-2 text-purple-500">Tulips</h3>
            <p>Bright and cheerful blooms for any occasion.</p>
          </div>
          <div className="bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transition duration-300 text-center">
            <img src="https://source.unsplash.com/200x200/?lily" alt="Lily" className="mx-auto rounded-lg mb-4"/>
            <h3 className="font-bold text-xl mb-2 text-yellow-500">Lilies</h3>
            <p>Elegant and fragrant flowers for your home.</p>
          </div>
        </div>
      </section>

      {/* About / Why Choose Us */}
      <section className="py-20 px-6 md:px-20 bg-pink-50 rounded-t-3xl">
        <h2 className="text-3xl font-bold text-center mb-8 text-pink-600">Why Choose Us?</h2>
        <div className="grid md:grid-cols-3 gap-8 text-center">
          <div className="p-6">
            <FaLeaf className="text-green-500 text-5xl mx-auto mb-4" />
            <h3 className="font-bold text-xl mb-2">Fresh Flowers</h3>
            <p>Handpicked daily to ensure freshness and quality.</p>
          </div>
          <div className="p-6">
            <FaSeedling className="text-yellow-500 text-5xl mx-auto mb-4" />
            <h3 className="font-bold text-xl mb-2">Eco-Friendly</h3>
            <p>Responsibly sourced and environmentally friendly.</p>
          </div>
          <div className="p-6">
            <FaGift className="text-pink-500 text-5xl mx-auto mb-4" />
            <h3 className="font-bold text-xl mb-2">Perfect Gifts</h3>
            <p>Beautiful bouquets for birthdays, weddings, and more.</p>
          </div>
        </div>
      </section>

      {/* Footer */}
      <footer className="bg-pink-300 text-white py-8 text-center">
        <p>&copy; 2025 FlowerShop. All rights reserved.</p>
      </footer>
    </div>
  );
};

export default FlowerHome;
