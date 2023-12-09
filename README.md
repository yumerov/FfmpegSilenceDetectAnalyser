# Ffmpeg Silence Detect Analyser

Analyses FFmpeg logs for silence detection

## Structure

```mermaid
flowchart TD
    contracts[Contracts]
    app[Application]
    io[FileIo]
    data[Data]

    contracts --> io
    contracts --> data
    contracts --> app
    
    data --> io
    io --> app
```
