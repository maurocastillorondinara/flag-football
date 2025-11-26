import Header from './components/Header';
import Inicio from './components/Inicio';
import About from './components/About';
import Gallery from './components/Gallery';
import Footer from './components/Footer';

function App() {
  return (
    <div className="app">
      <Header />
      <main>
        <Inicio />
        <About />
        <Gallery />
      </main>
      <Footer />
    </div>
  );
}

export default App;
