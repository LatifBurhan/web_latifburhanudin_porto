import React, { useState, useEffect, useRef } from 'react';

export default function MainLayout({ children }) {
    const [darkMode, setDarkMode] = useState(
        localStorage.getItem('theme') === 'dark' ||
        (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
    );
    const [musicPlaying, setMusicPlaying] = useState(false);
    const audioRef = useRef(null);

    // Handle Dark Mode
    useEffect(() => {
        if (darkMode) {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        }
    }, [darkMode]);

    const toggleMusic = () => {
        const audio = audioRef.current;
        audio.volume = 0.2;
        if (!musicPlaying) {
            audio.play();
        } else {
            audio.pause();
        }
        setMusicPlaying(!musicPlaying);
    };

    return (
        <>
            {/* Dot Pattern Background */}
            <div className="fixed inset-0 pointer-events-none z-0 transition-opacity duration-500 bg-dot-pattern bg-dot-lg opacity-80"></div>

            {/* Audio Element */}
            <audio ref={audioRef} loop preload="auto">
                <source src="/audio/aboutyou1975.mp3" type="audio/mp3" />
            </audio>

            {/* Navigation Controls */}
            <div className="fixed top-6 right-6 z-50 flex items-center gap-3">
                {/* Music Button */}
                <button onClick={toggleMusic} className="p-3 rounded-full shadow-lg transition-all duration-300 transform hover:scale-110 active:scale-95 bg-white/80 dark:bg-rail-card/80 backdrop-blur-md border border-gray-200 dark:border-white/10 text-gray-600 dark:text-rail-accent hover:shadow-xl group relative overflow-hidden">
                    {musicPlaying && (
                        <div className="absolute inset-0 flex items-center justify-center gap-0.5 opacity-20 pointer-events-none">
                            <div className="w-1 bg-rail-accent animate-[bounce_1s_infinite] h-3"></div>
                            <div className="w-1 bg-rail-accent animate-[bounce_1.2s_infinite] h-5"></div>
                            <div className="w-1 bg-rail-accent animate-[bounce_0.8s_infinite] h-3"></div>
                        </div>
                    )}
                    {musicPlaying ? (
                        <svg className="h-6 w-6 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                        </svg>
                    ) : (
                        <svg className="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2" />
                        </svg>
                    )}
                </button>

                {/* Theme Button */}
                <button onClick={() => setDarkMode(!darkMode)} className="p-3 rounded-full shadow-lg transition-all duration-300 transform hover:scale-110 active:scale-95 bg-white/80 dark:bg-rail-card/80 backdrop-blur-md border border-gray-200 dark:border-white/10 text-gray-600 dark:text-rail-accent hover:shadow-xl group">
                    {darkMode ? (
                        <svg className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    ) : (
                        <svg className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth="2">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    )}
                </button>
            </div>

            {/* Content Area */}
            <main className="relative z-10 h-full w-full overflow-hidden">
                {children}
            </main>
        </>
    );
}
