import UQOLogo from '/public/build/assets/UQO-logo.svg';

export default function ApplicationLogo({ className }: { className?: string }) {
    return (
        <img 
            src={UQOLogo} 
            alt="Application Logo" 
            className={className} 
        />
    );
}
